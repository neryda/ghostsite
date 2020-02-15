<?php




//ассоциативный массив $_POST для доступа ко всей информации отправляемой с помощью метода POST

if (isset($_POST["name"])) {

  $fh = fopen("array.txt", 'r') or die("файл не существует");//открываем документ для чтения
  $data_TXT = fgets($fh);//Переменная получила строку считав весь файл array.txt как одну строку
  fclose($fh);//закрываем документ для чтения

  //echo "Подгруженный массив из array.txt";
  //echo $data_TXT;
  //echo "$_POST phonenumber:  ";
  //echo $_POST["phonenumber"];

	// Формируем массив для JSON ответа
  $result =  $data_TXT;// вставил на отправку любые данные c сервера
    //  'text'=> $_POST["text"] // беру массив $_POST и значение по индексу text

//file_put_contents("array.txt", json_encode($result));//сохраним в файле

    // Переводим массив в JSON
    //echo json_encode($result);
    echo $result;

//{"name":"55","phonenumber":"66","phonenumber2":"66"} такой вид
};


if (isset($_POST["phonenumber"])) {
  //подгрузим рейтинг
  $fh_sold = fopen("array_sold.txt", 'r') or die("файл не существует");//открываем документ для чтения
  $data_TXT_sold = fgets($fh_sold);//Переменная получила строку считав весь файл array.txt как одну строку
  fclose($fh_sold);//закрываем документ для чтения
  $result_sold = $data_TXT_sold;
  echo $result_sold;
}

?>
