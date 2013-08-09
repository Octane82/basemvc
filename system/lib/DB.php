<?php
//Database library (PDO)

class DB{

    private static $_instance;
    public $sql;                             //Выражение SQL
    public $connection;
    public $select;
    public $from;
    public $join;
    public $where;
    public $group;
    public $having;
    public $order;
    public $limit;
    public $bindparams = array();			//экранируемые параметры в подготовленном запросе
    public $statement;						//statement (сообщение)

    private function __construct(){}
    private function __clone(){}

    public static function getInstance(){
        if(!self::$_instance instanceof self){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    /**
     * Подключение к БД     TODO:   параметры подключения из файла конфигурации
     * @return $this
     */
    public function db(){
        $host = 'localhost';
        $db = 'sqltest';
        $user = 'root';
        $pass = '';
        $this->connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
        return $this;
    }

    /**
     *
     * @param string $sql   выражение SQL. Если присутствует, тогда после этого метода сразу queryRow()
     * @return $this
     */
    public function createCommand($sql=''){
        if($sql != ''){
            $row = $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else
        {
            return $this;
        }
    }

    /**
     * выражение SELECT
     * @param $columns  название полей для выборки
     * @return $this
     */
    function select($columns){
        $this->select = 'SELECT '.$columns.' ';
        return $this;
    }

    /**
     * выражение SELECT , добавляет SELECT DISTINCT
     * @param $columns  название полей для выборки
     * @return $this
     */
    function selectDistinct($columns){
        $this->select = 'SELECT DISTINCT '.$columns.' ';
        return $this;
    }

    /**
     * выражение FROM (из какой таблицы выбираем)
     * @param $table    название таблицы
     * @return $this
     */
    function from($table){
        $this->from = 'FROM '.$table.' ';
        return $this;
    }

    /**
     * Выражение JOIN (объединение нескольких таблиц)
     * @param $type     тип связи (INNER, LEFT, RIGHT и т.д.)
     * @param $table    название таблицы с которой объединяем
     * @param string $condition     условия объединения ON
     * @return $this
     */
    function join($type, $table, $condition = ''){
        $this->join = strtoupper($type).' JOIN '.$table.' ON '.$condition.' ';
        return $this;
    }


    /**
     * Выражение WHERE
     * where('id=:id', array(':id'=>$id))
     * @param $vars              переменные условия WHERE
     * @param array $params     экранируемы параметры в подготовленном запросе
     * @return $this
     */
    function where($vars, $params = array()){
        $this->bindparams = array_merge($this->bindparams, $params);
        $this->where = ' WHERE '.$vars.' ';
        return $this;
    }


    /**
     * Выражения GROUP BY
     * @param $columns  название группируемых полей
     * @return $this
     */
    function group($columns){
        $this->group = ' GROUP BY '.$columns.' ';
        return $this;
    }

    /**
     * Выражение HAVING
     * @param $vars              переменные условия HAVING
     * @param array $params     экранируемы параметры в подготовленном запросе
     * @return $this
     * TODO: переделать bindParams	(проверить вывод bind params)
     */
    function having($vars, $params = array()){
        $this->bindparams = array_merge($this->bindparams, $params);
        $this->having = ' HAVING '.$vars.' ';
        return $this;
    }

    /**
     * Выражение ORDER BY
     * @param $columns  название полей таблицы + тип сортировки ASC или DESC
     * @return $this
     */
    function order($columns){
        $this->order = ' ORDER BY '.$columns;
        return $this;
    }

    /**
     * Выражение LIMIT
     * @param $limit            количество выводимых записей
     * @param null $offset      смещение вывода от начала
     * @return $this
     */
    function limit($limit, $offset = null){
        if($offset != null){
            $this->limit = ' LIMIT '.$offset.' , '.$limit;
        }
        if($offset == null){
            $this->limit = ' LIMIT '.$limit;	//возвратит первые $limit столбцов
        }
        return $this;
    }


    /**
     * Добавление записей в таблицу БД
     * Метод INSERT сразу строит запрос, и выполняет его
     * INSERT INTO tbl_user (name, email) VALUES (:name, :email)
     * @param string $table     название таблицы в которую добавляем записи
     * @param array $columns    массив колонок и значений
     */
    function insert($table, $columns = array()){
        $strColumns = implode(', ', array_keys($columns));
        $bindValues = ':'.implode(', :', array_keys($columns));
        $statement = $this->connection->prepare('INSERT INTO '.$table.' ('.$strColumns.') VALUES ('.$bindValues.')');	//подготовка запроса
        $statement->execute($columns);
    }

    /**
     * Обновление записей в таблице БД
     * Метод UPDATE сразу строит запрос, и выполняет его
     * UPDATE tbl_user SET name=:name WHERE id=:id
     * @param string $table     название таблицы
     * @param array $columns    массив колонок изначений
     * @param string $conditions    условия обновления
     * @param array $params     параметры для экранирования в подготовленном запросе
     */
    function update($table, $columns = array(), $conditions, $params = array()){
        foreach($columns as $key=>$val){
            $strColumns .= $key.'=:'.$key.', ';
        }
        $strColumns = rtrim($strColumns, ", ");
        $allParams = array_merge($columns, $params);
        $statement = $this->connection->prepare('UPDATE '.$table.' SET '.$strColumns.' WHERE '.$conditions);
        $statement->execute($allParams);
    }


    /**
     * Удаление записей в таблице БД
     * Метод DELETE сразу строит запрос, и выполняет его
     * DELETE FROM tbl_user WHERE id=:id
     * @param string $table     название таблицы
     * @param string $conditions    условия для удаления
     * @param array $params         параметры для экранирования в подготовленном запросе
     */
    function delete($table, $conditions = '', $params = array()){
        $statement = $this->connection->prepare('DELETE FROM '.$table.' WHERE '.$conditions);
        $statement->execute($params);
    }

    /**
     * @return string   текст SQL запроса
     */
    function text(){
        return $this->sqlBuilder();
    }

    /**
     * Метод строит запрос из всех заданных методов в цепочке
     * выстраивает запрос по порядку
     * @return string   текст SQL запроса
     */
    function sqlBuilder(){
        $this->sql = '';
        if(isset($this->select)){ $this->sql .= $this->select; }
        if(isset($this->from)){ $this->sql .= $this->from;}
        if(isset($this->join)){ $this->sql .= $this->join; }
        if(isset($this->where)){ $this->sql .= $this->where; }
        if(isset($this->group)){ $this->sql .= $this->group; }
        if(isset($this->having)){ $this->sql .= $this->having; }
        if(isset($this->order)){ $this->sql .= $this->order; }
        if(isset($this->limit)){ $this->sql .= $this->limit; }
        return $this->sql;
    }


    /**
     * Метод возвращает ассоциативный массив результата запроса SQL
     * @return array
     */
    function queryRow(){
        $this->statement = $this->connection->prepare($this->sqlBuilder());		//подготовка запроса
        if(isset($this->bindparams)){						//если существут параметры в WHERE или HAVING
            foreach($this->bindparams as $key=>$val){
                if(is_integer($val)){
                    $this->statement->bindParam($key, $val, PDO::PARAM_INT);		//экранирование параметров
                }
                if(is_string($val)){
                    $this->statement->bindParam($key, $val, PDO::PARAM_STR);
                }
            }
        }
        $this->statement->execute();
        $rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);					//преобразовать объект в массив
        return $rows;
    }


}
