<html>
 <head>
  <title>SessionsAdd</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
 	<meta charset="utf-8">
	<table width="100%" cellspacing="0" border="1">	
		<TR>
			<TD>
			  <P>AddSessions:</P>
      			<form action="AddSessions.php" method="post">
				Пока специалист id(Example:1), не успел реализовать выпадающий список всех специалистов <select name="specId">
					<?php 
		                        include('config.php');	
					$link = mysqli_connect($server, $user, $password, $database)					
	    					or die('Error: Unable to connect: ' . mysqli_connect_error());
						
					$SQLquery = 'SELECT Passport, CONCAT(First_Name, \' \', Last_Name) FROM Workers';
					$SQLresult = mysqli_query($link,$SQLquery);
					while ($result = mysqli_fetch_array($SQLresult,MYSQLI_NUM))
					{
						printf('<option value=%d>%s</option>',$result[0],$result[1]);
					}
					mysqli_free_result($SQLresult);
					mysqli_close($link);
					?>
				</select>
          		  	<br><br>
          		Пока пациент по id(1), не успел реализовать выпадающий список всех пациентов <input type="text" name="pathId">
          		  	<br><br>
          		Начало сеанса['10:00'] <input type="text" name="timeStart">
          		  	<br><br>
          		Конец сеанса ['10:05'] <input type="text" name="timeFinish">
          		  	<br><br>
          		Пока диагноз по id(1), не успел реализовать выпадающий список всех диагнозов <input type="text" name="iddiagnosis">
          		  	<br><br>
          		Назначено лечение <input type="text" name="lechenie">
          		  	<br><br>
          		Пока id следующего врача(Специальности, не специалиаста), не успел реализовать выпадающий список всех специальностей <input type="text" name="sledSpec">
          		  	<br><br>
          		  	<input type="submit" value="AddSessions" id="button6">
          		  	<br><br>
          		  	<p>В таблице Sessions будут сохраняться все сеансы происходящие в больнице, к этой таблице привязаны idВрача, idпациента, время начала конца сеанса, диагноз лечение и направление к след.врачу, пока не реализовал сеанс, когда врач последний и следующего врача нет, там если NULL то в таблицу не заполняет.
          		  	Остается карта пациента, она задумана так: делается запрос на idпациента, потом по этому этому id cобирает все диагнозы за сегодняшнюю дату у пациента в таблице Sessions. Потом уже можно добавлять к карте пациента лист диагнозов за какую сегодняшнюю дату, т.е в следующий раз когда он придет добавит все его диагнозы на след дату. 
          		  	Карту пациента не успели сделать.</p>
      			  </form>
			</TD>
		</TR>
	</body>
</html>