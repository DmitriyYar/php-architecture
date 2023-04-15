<?php

/*
Наблюдатель: есть сайт HandHunter.gb. На нем работники могут подыскать себе вакансию
РНР-программиста. Необходимо реализовать классы искателей с их именем, почтой и стажем
работы. Также реализовать возможность в любой момент встать на биржу вакансий
(подписаться на уведомления), либо же, напротив, выйти из гонки за местом. Таким образом,
как только появится новая вакансия программиста, все жаждущие автоматически получат
уведомления на почту (можно реализовать условно).
*/

class User
{
    public function __construct(
        private string $id,
        private string $firstname,
        private string $lastname,
        private string $email,
        private string $experience,
    ) {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}


// интерфейс наблюдателей
interface Observer
{
    public function handle();
}

// интерфейс объекта
abstract class Subject
{
    abstract public function attach(Observer $observer); //прикрепить

    abstract public function dettach(Observer $observer);//отсоединить

    abstract protected function notify(); //уведомить
}


class VacancyRegisterManager extends Subject
{
    /** @var Observer[] */
    protected array $observers = [];

    // подписываем соискателей на уведомление
    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    // отписываем соискателей от уведомлений
    public function dettach(Observer $observer)
    {
        foreach ($this->observers as $key => $val) {
            if ($key == $observer->handle() - 1) {
                unset($this->observers[$key]);
            }
        }
    }

    // уведомляем всех наблюдателей
    protected function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle(); // дергает метод handle
        }
    }
}

// репозиторий вакансий
class VacancyRepository extends VacancyRegisterManager
{
    private array $vacancy = [];

    public function register($vacancy)
    {
        // Сохраняем вакансию в базе
        $this->vacancy[] = $vacancy;
        // оповещаем соискателей
        $this->notify();
    }
}


// подписаться на уведомления
class Subscriber implements Observer
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        //логика подписки пользователя на рассылку
        print_r($this->user);
    }
}

// отписаться от уведомлений
class Unsubscribe implements Observer
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        return $this->user->getId();
    }
}

// Текущие пользователи на сайте
$user1 = new User('1', 'Дмитрий1', 'Петров1', 'dmitry@mail.ru', '1');
$user2 = new User('2', 'Дмитрий2', 'Петров2', 'dmitry@mail.ru', '2');
$user3 = new User('3', 'Дмитрий3', 'Петров3', 'dmitry@mail.ru', '4');

// реализация
$manager = new VacancyRepository();
// подписка пользователей на рассылку вакансий
$manager->attach(new Subscriber($user1));
$manager->attach(new Subscriber($user2));
$manager->attach(new Subscriber($user3));
// отписака пользователя от рассылки
$manager->dettach(new Unsubscribe($user3));
// регистрация новой вакансии
$manager->register('Новая вакансия PHP-программист');
