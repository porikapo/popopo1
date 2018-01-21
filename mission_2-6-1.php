<html>

<!-タイトルをつける->
<head>
<title>野良猫日記</title>
</head>

<!-見出しをつける->
<h1>野良猫日記</h1>

<!-入力フォームを作成する->
	<form method="post" action ="#">
	名前：  
	<input type ="text" name ="name"></br>
	コメント：
	<input type ="text" name ="comment"></br>
	送信パスワード:
 	<input type = "text" name ="pass" size ="2"/><br/>
	<input type ="submit"name="input" value ="送信"></br>
	削除番号:
	<input type ="text" name="del">
	パス:
 	<input type = "text" name ="dpass" size ="2"/>
	<input type ="submit"name="delete" value ="削除"></br>
	</form>

<?php
//入力データをphpで受け取り
	$name=$_POST['name'];
	$comment=$_POST['comment'];
	$del=$_POST['del'];
	$pass=$_POST["pass"];
	$dpass=$_POST["dpass"];

//テキストファイル名を変数$filenameに代入する
	$filename='mission_2-5.txt';


//入力日時をつける
	$time=date("Y/m/d/H:i:s");

//投稿番号をつける
	//カウント用ファイルを開く
	$fp2=fopen('./count.txt','r');
	//1行目を文字として読み取り
	$count_text=fgets($fp2);
	fclose($fp2);

	//文字列をint(整数)型に変換
	$count = (int)$count_text;
	$count+=1;

	//カウント用ファイルを空にして開く
	$fp2=fopen('./count.txt','w');
	//新しい数値を書き込む
	fwrite($fp2,$count);
	fclose($fp2);

//入力データを表示
		$fp=fopen('mission_2-5.txt','a');

		if(!empty($comment)){
		fwrite($fp,$count.'<>'.$name.'<>'.$comment.'<>'.$time.'<>'.$pass."<>\n");
		}
		fclose($fp);


//指定した番号の投稿を削除する
	//1行ずつの配列
		$filedate=file( $filename );
	//内容を消して開く
		$fp=fopen('mission_2-5.txt','w+');
	//配列から1つずつ取り出す
		foreach($filedate as $line){
       
        	//<>で切って配列にする
		$date=explode('<>',$line);

		//送信パスと削除パスが一致せず、「$delと違う」ときに括弧内を処理
		if($dpass!=$date[4]||$date[0]!=$del){
			//ファイルに追記
			fputs($fp,$line);
		}
		}
	//ファイルを閉じる
		fclose($fp);
?>

<?PHP
//編集機能を付ける
	//入力データをphpで受け取り
		$hen=$_POST['hen'];
	//1行ずつの配列
		$filedate=file( $filename );

	//配列から1つずつ取り出す
		foreach($filedate as $line){
       
        	//<>で切って配列にする
		$date=explode('<>',$line);

		//「$henと同じ」ときに括弧内を処理
		if($date[0]==$hen){
			$edit_num=$date[0];
		
			$user=$date[1];
		
			$text=$date[2];
		}
		}	

?>
<!-編集フォームを作成する->
	<form action="#" method="post">
	編集番号:<input type ="text" name="hen">
	パス:
	<input type = "text" name ="hpass" size ="2"/>
 	<input type ="submit"name="henshu" value ="編集番号">
	</form>

	<form action="#" method="post">
	<input name="edit_num" type ="hidden" value ="<?PHP echo $edit_num;?>"/></br>
	名前:<input name="user" type ="text" value ="<?PHP echo $user;?>"/>
	コメント:<input name="text" type ="text" value ="<?PHP echo $text;?>"/>
	<input type="submit"name="kaihen" value ="編集">
	</form>
<?PHP
//入力データをphpで受け取り
	$hen=$_POST['hen'];
	$edit_num=$_POST['edit_num'];
	$user=$_POST['user'];
	$text=$_POST['text'];
	$hpass = $_POST["hpass"];

//一行ずつ配列に入れる
	$filedate  = file('mission_2-5.txt');

//内容を消して開く
	$fp=fopen('mission_2-5.txt','w+');

//配列からひとつづつ取り出す
foreach($filedate  as $line){
	
	// 配列を順番に表示する
	//<>で切って配列にする
		$date=explode('<>',$line);
	//デバック領域
		//echo"check_ifl|".$date[0]."|".$edit_num."|<hr>";

	//投稿番号と編集番号、送信パスと編集パスが同じなら括弧の中処理
		if($hpass==$date[4]&&$date[0]==$edit_num){
			$text=$date[0].'<>'.$user.'<>'.$text.'<>'.$time."\n";

			//編集した一行をファイルに追記
			fputs($fp,$text);

	//一致しないときは元のデータをそのまま書き込み
		//元の一行をファイルに追記
		}else{
			fputs($fp,$line);
		}
}
//ファイルを閉じる
	fclose($fp);
?>
<?PHP
// 読み込むファイル名の指定
	$file_name = "mission_2-5.txt";
	
// ファイルを全て配列に入れる
	$filedate = file( $file_name );

	// 取得したファイルデータ(配列)を全て表示する
	//配列からひとつづつ取り出す
		foreach($filedate as $line){
	// 配列を順番に表示する
		//<>で切って配列にする
			$filedate=explode('<>',$line);
		//投稿番号
			echo'番号:'.$filedate[0].'<br />'; 
		//コメント
			echo $filedate[2].'<br />';
		//名前
			echo'By:'.$filedate[1].'<br />';
		//投稿日時
			echo'投稿日時:'.$filedate[3].'<br />';
		//区切り
			echo'<hr/>';
		}
?>

</html>