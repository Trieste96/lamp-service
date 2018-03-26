FROM centos:7

RUN yum localinstall -y http://repo.mysql.com/mysql-community-release-el6-5.noarch.rpm \
	&& yum install -y mysql-community-server \
	&& yum clean all
EXPOSE 3306



