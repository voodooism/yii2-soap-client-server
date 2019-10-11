<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 SOAP Client-Server Calculator</h1>
    <br>
</p>

##Описание   
####Backend:
SOAP-сервер с одной функцией Calculate принимающей на вход следующие параметры:
- city – текст  
- name – текст  
- date – дата в формате yyyy-mm-dd  
- customParam1 - текст
- customParam2 - текст
- customParam3 - текст

Результат вызова функции возвращает параметры:
- price – стоимость (генерируется случайное число)
- info – информационное сообщение

В случае если параметр date в запросе меньше текущего дня, выбрасывает SoapFault исключение.  
Реализована basic аутентификация.   

####Front-end
Тестовые данные для входа:  
**User:** *user*  
**Password:** *password*  

#####Страница калькулятор.  
Форма принимает параметры и вызывает у SoapServer'a метод *calculate* используя введенные пользователем параметры в качестве аргумента.  
При нажатии на кнопку *"Рассчитать"* отправляется асинхронный запрос к серверу.  
Результат запроса отображается под формой.  

##Разворачивание проекта:  
1. **docker-compose up**  
2. **php init**  
  *(development environment)*
3. php yii migrate

С хостовой машины проект будет доступен по следующим адресам:  
**Backend:** http://soap-server.devel:8081  
**Frontend:** http://calculator.devel:8080  
Необходимо добавить данные домены в файл hosts  

Gist с описанием задачи:  
https://gist.github.com/voodooism/af605aa024bc914598fb76f13db9762b