FROM centos:7

#Install Apache 2.4
RUN yum update -y && yum install -y httpd && yum clean all
EXPOSE 80

#Install PHP 5.6
RUN rpm -Uvh http://vault.centos.org/7.0.1406/extras/x86_64/Packages/epel-release-7-5.noarch.rpm \
&& rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm \
&& yum --enablerepo=remi,remi-php56 install -y php php-common \
&& yum --enablerepo=remi,remi-php56 install -y php-cli php-pear php-pdo php-mysql php-mysqlnd php-pgsql php-sqlite php-gd php-mbstring php-mcrypt php-xml php-simplexml php-curl php-zip

#Install Redis
RUN yum install -y epel-release && yum install -y redis

ADD QuanLyTruongDaiHoc/ /var/www/html/