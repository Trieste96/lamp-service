FROM centos:7

RUN yum install wget -y

#Install Apache 2.4
RUN  yum install -y httpd && yum clean all
EXPOSE 80

#Install PHP 5.6
#Source: http://devdocs.magento.com/guides/v2.0/install-gde/prereq/php-centos.html#instgde-prereq-php56-install-centos
RUN yum -y update \
&& yum -y install epel-release \
&& wget https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
&& wget https://centos7.iuscommunity.org/ius-release.rpm \
&& rpm -Uvh ius-release*.rpm \
&& yum -y update \
&& yum -y install php56u php56u-opcache php56u-xml php56u-mcrypt php56u-gd php56u-devel php56u-mysql php56u-intl php56u-mbstring php56u-bcmath php56u-soap


#Install Redis
RUN yum install -y redis

ADD QuanLyTruongDaiHoc/ /var/www/html/

CMD ["httpd"]