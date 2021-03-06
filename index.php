<!doctype html>

<html>
	<head>
		<title>Построение через JS</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="style.css"><!--Указание на использование таблицы стилей-->
		<link rel="stylesheet" href="normalize.css"><!--Указание на использование таблицы стилей-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>


    <title>Title</title>

		<style>
		.content{/*содание flex-технологии для content*/
				display:flex;
				flex-direction: row;
				justify-content: center;
				align-items: flex-start;
			  flex-wrap: wrap;
		}
			.main{
				display:flex;
				/*columns:   не будет уже работать*/
				/*float:   не будет уже работать*/
				/*clear   не будет уже работать*/
			 /*vertical-align:    не будет уже работать*/
			/* height: 500px; т.к. у bl нету конкретной высоты - они вытягиваются по всему main(т.к. это поперечная ось)*/
			flex-direction: row;/*  значение по умолчанию главной оси слева-направо прижимание к лево, поперечная сверху-вниз*/
			 /*flex-direction: column; /*значение по умолчанию главной оси сверху-вниз прижимание к верху, поперечная слева-направо*/
			 /*flex-direction: column-reverse; значение по умолчанию главной оси СНИЗУ-ВВЕРХ прижимание к низу, поперечная слева-направо*/
			 /*flex-direction: row-reverse; значение по умолчанию главной оси СПРАВО-НАЛЕВО прижимание к ПРАВО, поперечная сверху-вниз*/

			/* justify-content: flex-start; /*значение прижимания, сейчас по умолчанию, прижаты к началу в зависимости от flex-direction*/
			 /*justify-content: flex-end; значение прижимания, прижаты к концу главной оси в зависимости от flex-direction*/
			 /*justify-content: space-between; распределение блоков равномерно, от начала главной оси и до конца*/
			 /*justify-content: space-around; распределение блоков равномерно с учетом отступов*/
			 justify-content: center; /*равномерное распределение блоков по центру главной оси*/

			/*align-items: stretch;свойство растягивания по поперечной оси*/
			 /*align-items: center; блоки становятся по центру, не растягиваются*/
			 /*align-items: flex-end; блоки прижимаются к концу главной оси*/
			 align-items: flex-start;/* блоки прижимаются к началу главной оси*/
			 /*align-items: baseline; выравнивание относительно базовой линии, т.е. начало низа шрифта*/

			}

		</style>
	</head>

<body>

<!--Создание верхнего меню-->
  <div class="header">
		<div class="wrapper">
			<div class="navigation">
			  <img src="img/img.png" alt="">
				<img src="img/img1.png" alt="">
		  	<ul class="nav">
		  		<li><a href="">Главная</a></li>
					<li><a href="">Новости</a></li>
					<li><a href="">Новости2</a></li>
					<li><a href="">Компания</a></li>
		  	</ul>
			</div>
		</div>
  </div>
<!--Конец верхнего меню-->

<!--Создание основного контента-->
	<div class="wrapper">
		<div class="wrapper_small">
			<div class="content" id="content">

			</div>
  	</div>
	</div>
<!--Конец основного контента-->

<!--PHP Начало загрузки данных с файла-->

<!-- PHP Конец загрузки данных с файла-->


<!--Создание НИЖНЕГО меню-->
  <div class="header">
		<div class="wrapper">
			<div class="wrapper_footer_small">

			   <img src="img/img.png" alt="">
				 <ul class="nav_footer">
					 <li><a href="">Главная</a></li>
					 <li><a href="">Новости</a></li>
					 <li><a href="">Новости2</a></li>
					 <li><a href="">Компания</a></li>
				 </ul>

			</div>
		</div>
  </div>
<!--Конец НИЖНЕГО меню-->

<!--JavaScript-->
  <script>

/*
	$( document ).ready(function() {
	    $("#btn").click(
			function(){
			//	sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');// убрал лишний аргумент
	      sendAjaxForm('result_form', 'ajax_form');
				return false;
			}
		);
	});*/


	// AJAX-запрос, который будет отправлен на сервер:
	//   по адресу: action_ajax_form.php
	//   методом POST
	//   содержащий данные $data в виде name=John&phonenumber=Boston&text=1111
	// success - это функция, которая будет вызвана после получения ответа от сервера
	//   (сам ответ доступен посредством аргумента result)


	/*	*/

	$.ajax({ // аякс запрос с помошью jquery

			url:     "action_ajax_form.php", //url страницы (action_ajax_form.php)
			type:     "POST", //метод отправки
			dataType: "html", //формат данных "html" — полученный html будет доступен в текстовом виде. Если он содержит скрипты в тегах
			// <script>, то они будут автоматически выполнены, только когда html-текст будет помещен в DOM.
			data: "name=John", // передаю данные на сервер в виде данные прилетят в PHP в глобальную переменную POST
			//data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект можно и в таком виде(если надо собрать данные с формы)
			/*serialize() - предназначен для сериализации данных формы в строку запроса.
				имяПоля1=значение1&имяПоля2=значение2...т.е.на всех form с id ajax_form будут получены
				значения input, textarea и select. В моём случае из input берется:
				name=%D0%9F%D0%B0%D0%B2%D0%B5%D0%BB1 & phonenumber=%D0%9D%D0%B5%D0%B1%D0%BE%D0%B3%D0%B8%D0%BD2*/
				//console.log(this.data);// для проверки
			success: function(response) { //Данные отправлены успешно - выполняется функция
				var array_news = [{}]; // глобальная переменная с массивом объектов для загрузки в неё исходных данных
				// действия при получения ответа (response) от сервера
				// response содержит такой вид как СТРОКА json  {"name":"55","phonenumber":"66","phonenumber2":"66"}
				// response содержит то, что отправит обратно PHP c action_ajax_form.php
				// console.log(response);

				result = $.parseJSON(response);// преобразуем текстовую строку в массив объектов.
				//т.к. сервер отправил строку в JSON формате, то мы её восстанавливаем
				//console.log(response);
				//result - содержит уже как МАССИВ ОБЪЕКТОВ
			//	console.log(result);
				//console.log(typeof result); result у нас становится объектом

				array_news = result;// т.к. в коде завязано все на array_news, наполняем переменную-массив объектами
				if (array_news.length != 0) {// если массив с основными данными не пустой, то делаем ещё запрос на рейтинг

					$.ajax({ // второй запрос для подгрузки рейтинга - передаем на сервер слово phonenumber=Boston в POST
								url:     "action_ajax_form.php", //url страницы (action_ajax_form.php)
								type:     "POST", //метод отправки
								dataType: "html", //формат данных "html" — полученный html будет доступен в текстовом виде.
								data: "phonenumber=Boston", // передаю данные на сервер в виде данные прилетят в PHP в глобальную переменную POST
								success: function(response) { //Данные отправлены успешно - выполняется функция
									var array_sold = [{}]; // глобальная переменная с массивом объектов для загрузки в неё рейтинга
									// console.log(response);
									array_sold = $.parseJSON(response);// преобразуем текстовую строку в массив объектов.
									console.log(array_sold);
									mainView.createElementMain(array_news, array_sold);//вызываем первый метод объекта, который будет строить каркас сайта
									//и передаем в него уже готовые данные с сервера
							},

							error: function(response) { // Данные не отправлены
										console.log("ДАННЫЕ НЕ ОТПРАВЛЕНЫ С СЕРВЕРА");
							}
					});
				}
				//console.log(typeof  result.phonenumber2);

				// и передаем ему массив с объектами в аргументе

				//phonenumber=Boston
				//name=John
		},

		error: function(response) { // Данные не отправлены
					console.log("ДАННЫЕ НЕ ОТПРАВЛЕНЫ С СЕРВЕРА");
		}
});



//console.log(array_news);
//массив образованный из файла


//document.body.onload = addElement; при загрузке body
 var my_div = newDiv = null;
/*

function test() {//копирование полного объекта

   document.querySelector(".content").appendChild(document.querySelector(".main").cloneNode(true));
};
*/

//объект который умеет строить элементы с новостями и взаимодействовать.
var mainView = {

	//первый метод объекта
	createElementMain: function(array_news, array_sold){

		for (var i = 0; i < array_news.length; i++) {//ГЛАВНЫЙ ЦИКЛ перебираю массив объектов новостей и создаю каждую новость в виде div блока

		// создаем новый элемент div c классом main и меняем CSS
    var newDiv_main = document.createElement("div");
        newDiv_main.className = 'main';//класс main
        newDiv_main.id = 'main_id'+i;// id main
        newDiv_main.style.backgroundColor = 'rgba(243,224,255,0.3)';//css свойства
        newDiv_main.style.width = "225px";//css свойства
        newDiv_main.style.height = "275px";//css свойства
    // добавляем только что созданый элемент в дерево DOM
    let my_div_content = document.getElementById("content");//получаем id content, чтобы вставить ВНУТРЬ него main
		my_div_content.style.justifyContent = 'center';//обязательно писать свойство justifyContent через заглавную букву
    my_div_content.appendChild(newDiv_main);//вставляем внутрь content новый элемент main
    //document.body.insertBefore(newDiv, my_div); вставить до тега контент

		var newDiv_bl = document.createElement("div");
				newDiv_bl.className = 'bl';//класс bl
				newDiv_bl.id = 'bl'+i;// id main
				newDiv_bl.innerHTML = array_news[i].name_news;//вставляем внутрь текст, беря его из массива
				newDiv_bl.style.backgroundColor = 'rgba(255,250,242,0.8)';
				newDiv_bl.style.width = "auto";//css свойства
				newDiv_bl.style.height = "auto";//css свойства

		  //newDiv.onclick = delete_obj;//обработчик события на клике
		// добавляем только что созданый элемент в дерево DOM
		let my_div_main = document.getElementById("main_id"+i);//получаем id main, чтобы вставить ВНУТРЬ него
		my_div_main.appendChild(newDiv_bl);//вставляем внутрь main новый элемент
		let my_bl_main = document.getElementById(newDiv_bl.id);//получаем id main, чтобы вставить ВНУТРЬ него
    my_bl_main.onclick = eventTarget;/*каждому элементу заголовка bl назначаем в свойстве onckick обработчик события метод Объекта*/


		// создаем новый элемент img c классом img и его CSS
		var newDiv_img = document.createElement("img");
				newDiv_img.className = 'img';//класс img
				newDiv_img.src = array_news[i].picture;//путь к картинке, беря его из массива
				newDiv_img.style.width = "200px";//css свойства
				newDiv_img.style.height = "200px";//css свойства
				my_div_main.appendChild(newDiv_img);//вставляем внутрь main новый элемент

	// создаем новый элемент div c классом block_all_star для всех звезд
		var newDiv_block_all_star = document.createElement("div");//переменная содержащая новый элемент div

				newDiv_block_all_star.className = 'block_all_star';//класс block_all_star
				newDiv_block_all_star.id = 'block_all_star'+i;// id block_all_star и прибавляем к названию i
				newDiv_block_all_star.style.backgroundColor = 'white';//цвет белый
				newDiv_block_all_star.style.width = "auto";//css свойства ширины
				newDiv_block_all_star.style.height = "auto";//css свойства высоты
				newDiv_block_all_star.innerHTML = 'Рейтинг: '+ (rate(array_sold,i))+'&nbsp'+'&nbsp'; //рейтинг в названии и передача функции в виде переменной в конце два пробела
				newDiv_block_all_star.style.fontSize = '12px'; // шрифт
				newDiv_block_all_star.style.fontWeight = 'bold';//жирный шрифт
        my_div_main.appendChild(newDiv_block_all_star);// добавляем блок в main блок

				//цикл для добавления div звезд block_all_star
				for (var j = 1; j < 6; j++) {
					var my_block_all_star = document.getElementById(newDiv_block_all_star.id);//берем по id block_all_star именно в этой итерации цикла
					var newDiv_block_star = document.createElement("img");//переменная содержащая новый элемент img

							newDiv_block_star.className = 'block_star';//класс block_star
							newDiv_block_star.id = 'block_star'+j;// id block_star + j
							newDiv_block_star.src = 'img/star.png'; //картинка по адресу

							if (j <= (rate(array_sold,i))) { //условие каждую звезду раскрасим в оранжевый если номер
								//звезды меньше или равен рейтингу то красим
								newDiv_block_star.style.backgroundColor = 'orange';// оранжевый фон по умолчанию в css он черный
							};

							newDiv_block_star.style.width = "auto";//css свойства
							newDiv_block_star.style.height = "auto";//css свойства

							my_block_all_star.appendChild(newDiv_block_star);//вставляем в общий блок звезд

				};//конец цикла добавления звезд

			};//КОНЕЦ ГЛАВНОГО ЦИКЛА

			//Функция выводит средний рейтинг и округляет его
			function rate(array_sold,i) {

			function getPopularity(item) { // помощник функция делает массив из массива объектов выбирая объект sold
			    return item.sold;
			}
			// Извлекаем оценки популярности, получая массив чисел.
			var popularityScores = array_sold.map(getPopularity);
			//выходит такой массив, в каждом по 6 значений
		  //console.log(popularityScores);//[Array(6), Array(6), Array(6), Array(6), Array(6), Array(6), Array(6), Array(6), Array(6), Array(6)]
			var all_Scores = 0;
			var sum_Mark = 0;
			var mean_Scores = 0;
			for (var j = 0; j < popularityScores[j].length; j++) {

			//	console.log(i);
			//	console.log(popularityScores[i][j]);
			//	console.log(popularityScores[j].length);

				all_Scores = all_Scores + ((popularityScores[i][j])*j);//сумма всех оценок по новости
				sum_Mark = sum_Mark + (popularityScores[i][j]);//количество всех оценок по новости
			};
			mean_Scores = Math.floor(all_Scores/sum_Mark * 100) / 100 ;//седнеарифметическое оценка
		  //	console.log(all_Scores);
		  //	console.log(sum_Mark);
			//console.log(mean_Scores);

			return mean_Scores;//возвращаем седнеарифметическое оценка
};

//функция проверяет какой объект генерирует события клика
//и с помощью неё можно понять, что мы будет обращаться по определенному индексу в массиве
//number_in_array - индекс который мы передадим во второй метод
		function eventTarget(eventobj){
			var button_click = eventobj.target; //переменная хранит объект события
			var name = button_click.innerHTML;//вычисляем текст кнопки заголовка

			for (var i = 0; i < array_news.length; i++) {//сравниваем текст с текстом массива
        if (array_news[i].name_news == name) {
					number_in_array = i;//индекс приравниваем в переменную для передачи
				};
			};
			mainView.createElementNews(array_news, number_in_array, array_sold);//вызываем второй метод
		}

},//конец первого метода

	//ВТОРОЙ метод объекта
	//Создаёт поле с новостью
	createElementNews: function(array_news, number_in_array, array_sold){

		for (var i = 0; i < array_news.length; i++) {
			let my_div_main = document.getElementById("main_id"+i);//получаем id main чтобы удалить потом
			my_div_main.remove();//удаляем main блоки
			//node.remove() //тоже самое только для node
		};//конец цикла

		let my_content = document.getElementById("content");//получаем id content, чтобы изменить свойства
		    my_content.style.justifyContent = 'flex-start';//обязательно писать свойство justifyContent через заглавную букву

		var newDiv_news = document.createElement("div");//создали общий элемент News в который вложим два элемента крестик и саму новость
				newDiv_news.className = 'news';//класс main
				newDiv_news.id = 'news_id';// id main
				newDiv_news.style.display = 'flex';//технология flex
				newDiv_news.style.flexDirection = 'column';//главная ось СВЕРХУ ВНИЗ, чтобы блоки верхний и нижний получились


		// добавляем только что созданый элемент в дерево DOM
		let my_div_content = document.getElementById("content");//получаем id content, чтобы вставить ВНУТРЬ него newDiv_news
		my_div_content.appendChild(newDiv_news);//вставляем внутрь content новый элемент main
		//document.body.insertBefore(newDiv, my_div); вставить до тега контент

		//создаём 2 блока(верхний и нижний) для вложения новости и кнопки закрытия
		var newDiv_news_block_top = document.createElement("div");//переменная нового элемента верхнего блока
				newDiv_news_block_top.className = 'newDiv_news_block_top';//klass
				newDiv_news_block_top.id = 'newDiv_news_block_top_id';// id
		var newDiv_news_block_bottom = document.createElement("div");// переменная нового элемента нижнего блока
				newDiv_news_block_bottom.className = 'newDiv_news_block_bottom';// klass
				newDiv_news_block_bottom.id = 'newDiv_news_block_bottom_id';// id
				newDiv_news_block_bottom.style.textAlign = "center"; // сделали элементы по центру если они строчные
		let my_div_content_news_id = document.getElementById("news_id");//получаем id блока c классом news, чтобы вставить ВНУТРЬ него
				my_div_content_news_id.appendChild(newDiv_news_block_top);//вставляем внутрь news - div верхнего блока
				my_div_content_news_id.appendChild(newDiv_news_block_bottom);//вставляем внутрь news - div нижнего блока

		//создаём  кнопку закрытия
		var newDiv_news_block_top_сlose = document.createElement("div");// переменная для создания кнопки
				newDiv_news_block_top_сlose.className = 'newDiv_news_block_top_сlose';//класс main кнопки закрытия новости
				newDiv_news_block_top_сlose.id = 'newDiv_news_block_top_сlose_id';// id кнопки закрытия новости
				newDiv_news_block_top_сlose.innerHTML = 'X';// содержимое текст Х
				newDiv_news_block_top_сlose.onclick = function(){

				my_div_content_news_id.remove();//удаляем блок news
				mainView.createElementMain(array_news, array_sold);//возвращаемся на главную, создаем заново main
				};
					// событие по клику крестика
		let my_div_content_close_id = document.getElementById("newDiv_news_block_top_id");//получаем id верхнего блока чтобы вставить кнопку
				my_div_content_close_id.appendChild(newDiv_news_block_top_сlose);//вставляем внутрь верхнего блока кнопку закрытия новости

mainView.createRepletionNews(array_news, number_in_array, array_sold);

	},//конец второго метода

	//начало третьего метода
	//наполняем то, что сделал второй метод
	createRepletionNews: function(array_news, number_in_array, array_sold){
//вычисляем id блока для вложения в него div-ов
		let block_bottom_id = document.getElementById("newDiv_news_block_bottom_id");

		function createNameTitle(i){//функция делает первый див с заголовком

			var title_main = document.createElement("div");//переменная нового элемента нижнего блока
				title_main.className = 'title_main';//klass
				title_main.id = 'title_main_id';// id
				title_main.style.width = "auto";//css свойства
				title_main.style.height = "auto";//css свойства
			  title_main.innerHTML = array_news[i].title_main[0];// содержимое текст из массива
        title_main.style.textAlign = "center";//делаем по центру текст
				title_main.style.fontWeight = "600";//толщина
				title_main.style.fontSize = "28px";//размер
				title_main.style.margin = "20px auto";//отступы
				block_bottom_id.appendChild(title_main);//вставляем див заголовок
		};

		function createTextMain(i){//делаем див для текста

			var text_main = document.createElement("div");//переменная нового элемента нижнего блока
				text_main.className = 'text_main';//klass
				text_main.id = 'text_main_id';// id
				text_main.style.width = "auto";//css свойства
				text_main.style.height = "auto";//css свойства
			  text_main.innerHTML = array_news[i].text_main[0];// содержимое текст Х
        text_main.style.textAlign = "center";//делаем по центру текст
				text_main.style.fontWeight = "600";//толщина
				text_main.style.margin = "50px auto";//размер
				block_bottom_id.appendChild(text_main);//вставляем див текст
		};

		function createImg(i,j){//делаем img для текста
			var img_main = document.createElement("img");//переменная нового элемента нижнего блока
				img_main.className = 'img_main';//klass
				img_main.id = 'img_main_id';// id
				img_main.style.width = "auto";//css свойства
				img_main.style.height = "auto";//css свойства
			  img_main.src = array_news[i].img[j];// содержимое текст Х

        img_main.style.display = "inline-block";//элементы строчные, а у родителя ставим центровку по центру

				img_main.style.margin = "20px 50px";
				block_bottom_id.appendChild(img_main);
		};

		console.log(number_in_array);// индекс элемента который сгененировал событие клик по названию новости
		//тут стили в зависимости от стиля выводится новость
		if (array_news[number_in_array].style_news == 1) {

			createNameTitle(number_in_array);
			createTextMain(number_in_array);
			for (var j = 0; j < array_news[number_in_array].img.length; j++) {
    	createImg(number_in_array,j);
		  };

	} else if (array_news[number_in_array].style_news == 2) {

			createNameTitle(number_in_array);
			for (var j = 0; j < array_news[number_in_array].img.length; j++) {
			createImg(number_in_array,j);
		  };
			createTextMain(number_in_array);
		};


		}//конец третьего метода


};//конец объекта



</script>


</body>

</html>
