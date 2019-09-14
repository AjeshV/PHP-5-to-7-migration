# PHP-5-to-7-migration
# 1) Environment upgrade to PHP 7

On Linux Ubuntu, install PHP 7:

sudo apt-get update
sudo add-apt-repository ppa:ondrej/php
sudo apt-get install -y php7.0-fpm php7.0-cli php7.0-curl php7.0-gd php7.0-intl php7.0-mysql

On Linux Red Hat Enterprise:

sudo yum update
rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
sudo yum install php70w
sudo yum install php70w-mysql

Verify with php -v

# 2) Multiple system wide versions using PHPBrew

Involving MySQL, SQLite, OpenSSL or debug are built and installed, integrated with bash/zsh shell.

curl -L -O https://github.com/phpbrew/phpbrew/raw/master/phpbrew
chmod +x phpbrew
sudo mv phpbrew /usr/local/bin/phpbrew

Add /usr/local/bin to $PATH environment variable.

phpbrew self-update
phpbrew install next as php-7.3.0
phpbrew use php-7.3.0

With variants example command: phpbrew install 7.0.0 +mysql+mcrypt+openssl+debug+sqlite

# 3) Laravel Homestead

Vagrant Box to manage Virtual Machines, without installing PHP. Includes Git, PHP 7.3, Nginx, MySQL.

vagrant box add laravel/homestead

# 4) Docker
php7-dockerized, Docker and Compose environment with MysQL.

Install Docker
~ docker info - to check containers and status.
git clone https://github.com/hamptonpaulk/php7-dockerized

Laradock, git clone https://github.com/Laradock/laradock.git
Enter laradock folder and run, docker-compose up -d nginx mysql redis beanstalkd

Set .env as,
DB_HOST=mysql
REDIS_HOST=redis
QUEUE_HOST=beanstalkd

# 5) PHP 7 features

i) Scalar Type Declaration: 
---------------------------

(PHP5) Typehint function parameter with classes, interfaces, callable and array types only, conditional statement to check other types.

function getNumber($n) {
    if (!is_integer($n)) {
        throw new Exception("Enter valid number");
    } return $n;
}

(PHP7) Not required to check, typehint with string, int, bool and float.

function getNumber(int $n) {
    return $n;
}
getNumber('string');

Error as typehint done with scalar value.

ii) Strong Type Check:

(PHP7) strict_types to avoid coercion that is allowed in PHP 5.

declare(strict_types=1);
function getNumber(int $n) {
    return ":" . $n;
}
echo getNumber("1");

Finishes with TypeError.

iii) Return Type Declaration:

Coerced in (PHP5), strict_type can be used in (PHP7) that throws type error if the return is other than the type specified.

declare(strict_types=1);
function divide(int $ft, int $sd): float {...

iv) Spaceship Operator:

$x <=> $y 

-1 if x is less than y, 0 if they are equal, 1 if x is greater.

v) Array Constants:

define() in (PHP5) accepts only scalar values, (PHP7) allows constant arrays.

vi) Group Use Declarations:

Multiple classes, functions and constants should be written seperately in (PHP5), they can be grouped in (PHP7),

use Unicodeveloper\Exceptions\{
    IsNull, UnknownMethod };

vii) Anonymous Classes:

Using objects to implement throwaway interfaces.

$book = new class implements SimpleInterface {
    public function bookName($Name) {
        return $Name
    }
};

$library = new Lib($book);

viii) Enhanced Unicode Support:

Hexadecimal code is appended to "\u" to get emoji output.

function getBook() {
    echo "\u{1E3D0}";
}

getBook();

ix) Null Coalescing Operator:

bookname is assigned if it exists, else CS

$BookName = $_GET['bookname'] ?? 'CS';

x) Closure on Call:

(PHP7) Call on closure to bind an object,

class Name {
    private $name = "Florence";
}

$getName = function() {
    echo $this->name;
};

$getName->call(new Name());

xi) Expectations and Assertions:

Can take 2 arguments in a custom error message, being instance of Exception.

assert('$project instanceof \Unicodeveloper\Project', new ProjectException('not a project object'));

xii) Generator Return Expressions:

Enables return to be used within generator with yielding values.

$gen = (function() {
    yield 1;
    yield 2;
    
    return 3:
})();

foreach ($gen as $val){
}
