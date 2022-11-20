/*$(document).ready(function(){
	var altura = $('.menu').offset().top;
	
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.menu').addClass('menu-fixed');
		} else {
			$('.menu').removeClass('menu-fixed');
		}
	});

});
*/
class Users{ 
	static users=null;
	constructor(){
		this.users=[];
		console.log("1");
	}
	static getUsers(){
		var wow;
		if(this.users==null){
			wow = new Users(); 
		}
		else{
			wow= this.users;
		}
		return wow;
	}
	newUser(name,password){
		let p = new User(name,password);
		this.users.push(p);
		return p;
	}
	
	printAll(){
		console.log("1");
		var i=0;
		while(i<this.users.length){
			console.log(this.users[i++].name);
		}
	}
}

class User{
	constructor(name,password){
		console.log("2");
		this.name=name;
		this.password=password;
	}
	userName(){
		return this.name;
	}
	userPass(){
		return this.Password;
	}
}

function proba1(){
	
	var wow = Users.getUsers();
	wow.newUser("iker","WOW");
	wow.newUser("34","WOW");
	wow.newUser("2552","WOW");

	wow.printAll();
}
function addUser(name,pass){
	var name=document.getElementById("correo").value;
	var pass=document.getElementById("pass").value;
	console.log(name);
	console.log(pass);
}


function changeMainImage(){
	var btn = document.getElementById("main");
	btn.setAttribute('src','images/23.png');
}

function changePage(p1){
	
	location.href =p1;
	
}
function changeMainPage1(){
	var btn = document.getElementById("main");
	var image = document.getElementById("bat");
	var link = document.getElementById("link");
	link.setAttribute('action','include/add.php');
	btn.setAttribute('var',"bat");
	btn.setAttribute('src',image.getAttribute("src"));
}
function changeMainPage2(){
	var btn = document.getElementById("main");
	var image = document.getElementById("bi");
	var link = document.getElementById("link");
	link.setAttribute('action','include/add2.php');
	btn.setAttribute('var',"bi");
	btn.setAttribute('src',image.getAttribute("src"));
}
function changeMainPage3(){
	var btn = document.getElementById("main");
	var image = document.getElementById("hiru");
	var link = document.getElementById("link");
	link.setAttribute('action','include/add3.php');
	btn.setAttribute('var',"hiru");
	btn.setAttribute('src',image.getAttribute("src"));
}
function changeMainPage4(){
	var btn = document.getElementById("main");
	var image = document.getElementById("lau");
	var link = document.getElementById("link");
	link.setAttribute('action','include/add4.php');
	btn.setAttribute('var',"lau");
	btn.setAttribute('src',image.getAttribute("src"));
}
function changeMainPage5(){
	var btn = document.getElementById("main");
	var image = document.getElementById("bost");
	var link = document.getElementById("link");
	link.setAttribute('action','include/add5.php');
	btn.setAttribute('var',"bost");
	btn.setAttribute('src',image.getAttribute("src"));
}
function changeMainPage6(){
	var btn = document.getElementById("main");
	var image = document.getElementById("sei");
	var link = document.getElementById("link");
	link.setAttribute('action','include/add6.php');
	btn.setAttribute('var',"sei");
	btn.setAttribute('src',image.getAttribute("src"));
}
