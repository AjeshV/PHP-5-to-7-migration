# PHP-5-to-7-migration
# 1) Environment upgrade to PHP 7.

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

# 2) Multiple system wide versions using PHPBrew.

Involving MySQL, SQLite, OpenSSL or debug are built and installed, integrated with bash/zsh shell.

curl -L -O https://github.com/phpbrew/phpbrew/raw/master/phpbrew
chmod +x phpbrew
sudo mv phpbrew /usr/local/bin/phpbrew

Add /usr/local/bin to $PATH environment variable.

phpbrew self-update
phpbrew install next as php-7.1.0
phpbrew use php-7.1.0

With variants example command: phpbrew install 7.0.0 +mysql+mcrypt+openssl+debug+sqlite

# 3) Laravel Homestead.

Vagrant Box to manage Virtual Machines, without installing PHP. Includes Git, PHP 7.1, Nginx, MySQL.

vagrant box add laravel/homestead

# 4) Docker.
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

# 5) PHP 7 features.

i) Scalar Type Declaration: 

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


