const express = require("express");
const fs = require("fs");
const app = express();

const bodyParser = require("body-parser");
const bodyParserForm = bodyParser.urlencoded();
let settings = {
    IdCounter:1
}
let books = []

//display all Books
app.get("/allbooks",function(req,res){

    let fbooks = books;
    if(req.query.q){
        fbooks = books.filter(book=> book.Name.indexOf(req.query.q)>-1 || book.Author.indexOf(req.query.q)>-1)
    }
    let tableBody  = "";
    //convert array of objects to array of strings 
    tableBody = fbooks.map((item)=>`<tr>
    <td>${item.Id}</td>
    <td>${item.Name}</td>
    <td>${item.Auther}</td>
    <td>
        <a href="/updatebook?Id=${item.Id}" >Edit</a> 
        <a href="/deletebook?Id=${item.Id}" >Delete</a>
    </td>
    </tr>`)
    /*
    [
        '<tr><td>Ahmed</td><td>010</td></tr>',
        '<tr><td>Ali</td><td>012</td></tr>',
        '<tr><td>Asmaa</td><td>011</td></tr>'
    ]
    */
    tableBody = tableBody.join("\n");
    /*
<tr><td>Ahmed</td><td>010</td></tr>
<tr><td>Ali</td><td>012</td></tr>
<tr><td>Asmaa</td><td>011</td></tr>
    */
    let html = `
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
    display :flex ;

}
form {
    padding : 20px ;
    margin : 10px ;

// }

input {
    padding :5px ;
    margin :10px ; 
    width :100% ;
}

.container {
    background-color: rgb(17, 199, 114);
    width :100% ; 
    text-align :center ;
    display : flex ;
    flex-direction :column ;
    justify-content :center ;
    align-items :center ;
}


table {
    border : 1px solid black ;
}
th , td {
    padding:10px ;
    margin :10px ;
    border:1px solid black ;
}

.addform{
    width : 400px ;
    border : 2px solid black ;
    border-radius :20px ;
    background-color: grey ;
}

.bodyflex {
    display : flex ;
    flex-direction : row ;
    justify-content :space-between  ;
}

a{
    padding : 10px ;
    margin :10px ;
}

.addbtn {
    background-color: rgba(13, 141, 216, 0.925) ;
    border-radius :5px ;
    width : 100px ;
    color : white ;
    cursor :pointer ;
}

.searchbtn{
    background-color: green ;
    border-radius :5px ;
    width : 100px ;
    color : white ;
    cursor :pointer ;
} 
</style>
<body>
<div class="container">

    <form >
        <input type="text" name="q" value="${req.query.q}" />
        <input type="submit" value="search" class="searchbtn"></br>
    
        </form>
<div class="bodyflex">
<form action="/addbook" method="POST" class="addform">
<h1>Add Book </h1><br>
        Name:<input type="text" name="Name" /><br/>
        Auther:<input type="text" name="Auther" /><br/>
        <input type="submit" value="add" class="addbtn" />
    </form>
    <h1 id="library">Library</h1><br>
 <table style="display:block;" >
        <tr >
            <th >Id</th>
            <th>Name</th>
            <th>Auther</th>
            <th>Action</th>
        </tr>
        ${tableBody}
    </table>
    <script>
    document.getElementById("library").addEventListener("click",function(){
        document.getElementById("library").style.display ="block" ;
    })</script>
</div>
   
    </div>
</body>
</html>`


    res.send(html);

})


//add new BOOK
// app.get("/addbook",function(req,res){
//     res.sendFile(__dirname+"/views/addbook.html");
// })

app.post("/addbook",bodyParserForm,function(req,res){
    req.body.Id = settings.IdCounter++;


    books.push(req.body)
    // saveDataToFile();
    res.send("<script>location='/allbooks'</script>");
})


//Search book or Auther 



//update Book


app.get("/updatebook",function(req,res){

    let book = books.find(book=>book.Id== req.query.Id);
    let html = `
    <form action="/updatebook" method="POST">
        <input type="hidden" name="Id" value="${book.Id}" />
        Name:<input type="text" name="Name" value="${book.Name}" /><br/>
        Auther:<input type="text" name="Auther" value="${book.Auther}" /><br/>
        <input type="submit" value="save" />
    </form>
    `;

    res.send(html);
});


app.post("/updatebook",bodyParserForm,function(req,res){
    //console.log(req.body);

//find item that match the id in the array
let bookIndex = books.findIndex(book=>book.Id==req.query.Id);
books.splice(bookIndex,1);
saveDataToFile();
res.send("<script>location='/allbooks'</script>");
})


//delete Book
app.get("/deletebook",function(req,res){
    // console.log(req.body);

//find item that match the id in the array
    let bookIndex = books.findIndex(book=>book.Id==req.query.q);
    books.splice(bookIndex,1);
    saveDataToFile();
    res.send("<script>location='/allbooks'</script>");
})

//saving 
function saveDataToFile(){

    fs.writeFile("contacts.json",JSON.stringify(books),function(err){
        if(err)
            console.log(err);
    })

    fs.writeFile("settings.json",JSON.stringify(settings),function(err){
        if(err)
            console.log(err);
    })
}


function loadDataFromFile(){
    fs.readFile("contacts.json",function(err,data){
        if(err){
            console.log(err)
        }else{
            books = JSON.parse(data);
        }
    })
    fs.readFile("settings.json",function(err,data){
        if(err){
            console.log(err)
        }else{
            settings = JSON.parse(data);
        }
    })
}


loadDataFromFile();





app.listen(4000);