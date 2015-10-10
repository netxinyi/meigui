# laravel5

### 环境要求
#### 1.PHP >= 5.5.9
#### 2.Laravel >= 5.1
#### 3.Rewrite Mod
#### 4.PHP5-Mcrypt扩展

### 安装方法
#### 下载代码
```
git clone https://github.com/netxinyi/meigui.git
```
#### 设置目录可写权限
```
sudo chmod 777 storage -R
sudo chmod 777 bootstrap/cache -R
```
#### 创建环境配置
```
cp .env.example .env
vim .env
```
#### 创建数据库
```
php artisan migrate:install 
```
#### 访问网站

### 编码规范
#### PSR-1\PSR-2 代码风格
#### PSR-4自动加载
