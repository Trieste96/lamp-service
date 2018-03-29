FROM centos:7

RUN rpm -Uvh http://repo.mysql.com/mysql-community-release-el6-5.noarch.rpm \
	&& yum -y install mysql-server
	
ADD web2.sql /sql/

EXPOSE 3306
