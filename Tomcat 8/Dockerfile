FROM centos:7

RUN yum install wget -y \
	&& yum install java-1.7.0-openjdk-devel -y
ENV JAVA_HOME="/usr/lib/jvm/jre/"

RUN wget http://mirror.downloadvn.com/apache/tomcat/tomcat-8/v8.0.50/bin/apache-tomcat-8.0.50.tar.gz \
	&& mkdir /opt/tomcat \
	&& tar xvf apache-tomcat-8*tar.gz -C /opt/tomcat --strip-components=1
	
ADD ./tomcat.service /etc/systemd/system/tomcat.service

EXPOSE 8080

CMD ["/opt/tomcat/bin/startup.sh"]