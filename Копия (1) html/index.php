<?php
require __DIR__ . '/vendor/autoload.php';


class User
{

    private string $name;
    private int $age;
//    private string $email;

    public function __construct(string $name, int $age)
    {
        $this->getAll($name, $age); //<- выше строк setName и setAge для вывода Name и Age при ошибке (Name = Alex, Age = 222) + MyCustomException
        $this->setName($name);
        $this->setAge($age);
    }

//    private function setEmail(string $email){} // для проверки сущесвования метода

    private function setName(string $name)
    {
        if (strlen($name) > 10) {
            throw new MyCustomException("Name ( $name ) > 10 !!!"); //проверка для примера
        }
        $this->name = $name;
    }

    private function setAge(int $age)
    {
        if (!is_numeric($age) || $age > 150) {
            throw new MyCustomException("Age ( $age ) is not numeric or more than 150 !!! ");
//            throw new Exception("Age ( $age ) is not numeric or more than 150 !!! ");
        }
        $this->age = $age;
    }

    public function getAll(string $name, int $age)
    {
        echo "Name = $name <br/> ";
        echo "Age = $age <br/>";
    }

    public function __call($method, $arguments)
    {
        if (!method_exists($this, $method)) {
            echo "Method ( $method ) does not exist !!! <br/>"; // для наглядности
            throw new MyCustomException("Method ( $method ) does not exist !!! ");
        } else {
            echo "Method ( $method ) exist<br/>";
        }
    }
}


class MyCustomException extends Exception // кастомный Exception
{
}

try {
//    $obj = new User('Alex', 222);
    $obj = new User('Alex', 22);
    $obj->setAge();
    $obj->setName();
    $obj->setEmail();
} catch (MyCustomException $e) {
    echo "<br/>=== getFile, getLine, getMessage ===";
    d($e::class, $e->getFile(), $e->getLine(), $e->getMessage());
} catch (Exception $e) { // стандартный с другими сообщениями
    d($e::class, $e->getMessage(), $e->getTrace());
}

//=== ДЗ 7. Overloading (Перезавантаження) ============================================================================
//Створіть клас User, який буде мати private поля $name, $age, $email і матиме __call метод. Так само клас буде мати
// приватні методи: setName, setAge.
//
//Метод __call повинен перевірити, що якщо ви викликаєте не існуючий метод, наприклад setEmail, то він вам виведе
// повідомлення що такого методу не існує, в інших випадках методи повинні виконатися. Отримати дані користувача
// я можу через public function getAll()
//
//Повідомлення має бути кастомним Exception
//
//Всю конструкцію викликів використовувати в try catch
//=====================================================================================================================
