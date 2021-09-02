## Công nghệ sử dụng

- Php 7.2.5
- Laravel ^8.0
- VueJS
- Mysql 8.0

## Hướng dẫn

Codebase anh đã dựng sẵn ở Repository này rồi, các em clone về và rồi làm theo các bước bên dưới để chạy nhé. Phần Codebase gần như là giống y hệt với laravel gốc.

Anh chỉ bổ sung thêm docker và chỉnh sửa một chút thông số.

1. Cài đặt docker & docker-compose (không rõ thì qua hỏi anh)
2. Chạy câu lệnh
```sh
cp .env.example .env
```
Để tạo file **.env** từ file **.env.example**

3. Chạy câu lệnh
```sh
docker-compose up -d
```
Để chạy các **container**

4. Chạy câu lệnh
```sh
docker-compose exec app composer install
```
Để sử dụng **composer** cài các thư viện cho laravel

5. Chạy câu lệnh
```sh
docker-compose exec app php artisan key:generate
```
Để tạo **APP_KEY** vào file **.env**

6. Chạy câu lệnh
```sh
docker-compose up -d
```
Để restart lại cái container. Sau đó truy cập vào http://localhost/ đối với web

Còn database thì:
```
Host: localhost
Username: dungnm
Password: dungnm
Ports: 3306
```

_Nếu trong quá trình cài đặt có vấn đề gì thì báo anh nhé_

Vì chạy bằng docker nên khi cần sự dụng **artisan** hay **composer** sẽ hơn khác với bình thường các em hay chạy.

Đơn giản là chỉ cần thêm đoạn: **docker-compose exec app** ở trước mỗi câu lệnh là được

VD:
```
php artisan make:migration create_users_table
```
sẽ được thay thế bằng:
```
docker-compose exec app php artisan make:migration create_users_table
```

## Gitflow

tất cả branch mới được phải được tạo ra từ branch **develop**

Branch mới được tạo để phát triển một tính năng thì tên phải bắt đầu bằng **feature/**. VD như: feature/login

Branch mới được tạo để fix bug thì tên phải bắt đầu bằng **fixbug/**.

Sau khi code xong thì phải tạo Pull request vào branch **develop**.