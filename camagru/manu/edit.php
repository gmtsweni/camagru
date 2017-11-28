<!--?php
if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'] || $_POST['submit'] !== "OK" || !($tab = file_get_contents("../private/passwd")))
{
echo "ERROR\n";
return ;
}
$tab = unserialize($tab);
$oldpw = hash('whirlpool', $_POST['oldpw']);
foreach ($tab as &$elem)
{
if ($elem['login'] === $_POST['login'] && $elem['passwd'] === $oldpw)
{
$elem['passwd'] = hash('whirlpool', $_POST['newpw']);
echo "OK\n";
$tab = serialize($tab);
file_put_contents("../private/passwd", $tab);
return ;
}
}
?-->
<html>
	<head>
		<title>Edit profile</title>
		<link rel="stylesheet" type="text/css" href="timeline.css">
	</head>
	<body class="edit_body">
		<header>
		<div class="nav">
			<ul>
				<li class="home"><a  href="Home.html">Home</a></li>
				<li class="gallary"><a  href="gallary.html">Gallary</a></li>
				<li class="profile"><a class="active" href="profile.html ">profile</a></li>
				<li  class="logout"><a href="logout.html">Logout</a></li>
			</ul>
		</div>
		</header>
		<main>
		<div class="card">
				<img src="bg.jpg" alt="profile picture" style="width:100%">
			<div>
				Email <input type="text" required autocomplete="off" placeholder="enter email address" required/>
			</div>
			<div>
				Old password <input type="text"required autocomplete="off" placeholder="enter old password" required/>
			</div>
			<div>
				New password <input type="text"required autocomplete="off" placeholder="enter new password" required/>
			</div>
			<div>  </div>
			<br />
			<li class="okbtn"><a href="profile.html">Submit</a></li>
			<li class="cancelbtn" ><a href="profile.html">cancel</a></li>
		</div> 
		</main>
		<footer>
		<div class="nav">
			<ul>
				copyright @copyright
			</ul>
		</div>   
		</footer>
	</body>
</html>
