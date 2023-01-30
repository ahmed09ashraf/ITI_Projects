const express = require("express");
const bodyParser = require("body-parser");
const fs = require("fs");

const bodyParserJson = bodyParser.json();

const app = express();
app.use(bodyParserJson);
app.use(express.static("frontend"));

let courses = [];
let settings = {
    coursesLastId:1 
};


//get courses

app.get("/",function(res,res){
    res.sendFile(__dirname+"/frontend/index.html");
})

app.get("/courses",function(req,res){
    let responseBody = {
        Success:true,
        Error:"",
        Data:courses
    }
    res.send(responseBody);
})

app.get("/courses/:id",function(req,res){
    let course = courses.find(x=>x.Id==req.params.id);
    let responseBody = {
        Success:true,
        Error:"",
        Data:course
    }
    if(!course){
        responseBody.Success=false;
        responseBody.Error="Course Not Found"; 
    }
    
    res.send(responseBody);
})

//add course
app.post("/courses",function(req,res){
    let responseBody = {
        Success:true,
        Error:"",
        Data:req.body
    }

    let validationResult = validateCourse(req.body);
    responseBody.Success=validationResult.Success;
    responseBody.Error=validationResult.Error;

    if(responseBody.Success){
        req.body.Id=settings.coursesLastId++;
    
        courses.push(req.body);
        saveToDB();
    }


    res.send(responseBody)
})

//update course
app.put("/courses",function(req,res){
    let course = courses.find(x=>x.Id==req.body.Id);
    let responseBody = {
        Success:true,
        Error:"",
        Data:course
    }

    if(!course){
        responseBody.Success=false;
        responseBody.Error="Course Not Found"; 
    }

    if(responseBody.Success){
        let validationResult = validateCourse(req.body);
        responseBody.Success=validationResult.Success;
        responseBody.Error=validationResult.Error;
    }

    if(responseBody.Success){
        course.Name=req.body.Name;
        course.Time=req.body.Time;
        saveToDB();
    }
    res.send(responseBody);
})


//delete course
app.delete("/courses/:id",function(req,res){
    let courseIndex = courses.findIndex(x=>x.Id==req.params.id);
    let responseBody = {
        Success:true,
        Error:"",
        Data:req.params.id
    }

    if(courseIndex==-1){
        responseBody.Success=false;
        responseBody.Error="Course Not Found"; 
    }

    if(responseBody.Success){
        courses.splice(courseIndex,1);
        saveToDB();
    }
    res.send(responseBody);
})




function validateCourse(course){
    
    let validationResult = {Success:true,Error:""}
    if(!course.Name || course.Name.length<3){
        validationResult.Success=false;
        validationResult.Error="Course Name Should Be At Least 3 Characters";
    }

    let exists = courses.find(x=>x.Name==course.Name && x.Id != course.Id);

    if(exists){
        validationResult.Success=false;
        validationResult.Error="Course Name Already Exists";
    }
    return validationResult;
}


//save db

function saveToDB(){
    fs.writeFile("courses.db",JSON.stringify(courses),function(err){
        if(err)
        console.log(err);
    })
    fs.writeFile("settings.db",JSON.stringify(settings),function(err){
        if(err)
        console.log(err);
    })
}

function loadFromDB(){
    fs.readFile("courses.db",function(err,data){
        if(err)
            console.log(err);
        else
            courses=JSON.parse(data);
    })

    fs.readFile("settings.db",function(err,data){
        if(err)
            console.log(err);
        else
            settings=JSON.parse(data);
    })
}


loadFromDB();


app.listen(8080);