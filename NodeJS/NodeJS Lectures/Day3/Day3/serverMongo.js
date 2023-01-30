const express = require("express");
const bodyParser = require("body-parser");
const fs = require("fs");
const { MongoClient, ObjectId } = require("mongodb");
const Md5 = require("md5");
const { v4: uuidv4 } = require('uuid');
const bodyParserJson = bodyParser.json();

const client = new MongoClient("mongodb://localhost:27017/");
const dbObject = client.db('School');
const coursesCollection = dbObject.collection("Courses");

const usersCollection = dbObject.collection("Users");




const app = express();
app.use(bodyParserJson);
app.use(express.static("frontend"));




//get courses

app.get("/",function(res,res){
    res.sendFile(__dirname+"/frontend/index.html");
})

app.get("/courses",async function(req,res){
    let user = null;
    console.log(req.headers.sessionid)
    if(req.headers.sessionid){
        user = await usersCollection.findOne({SessionId:req.headers.sessionid});
    }

    let responseBody = {
        Success:true,
        Error:"",
        Data: null
    }
    if(user){
        responseBody.Data=await coursesCollection.find({}).toArray();
    }else{
        responseBody.Success=false;
        responseBody.Error="UnAuthrized";
    }
    res.send(responseBody);
})

app.get("/courses/:id",async function(req,res){
    //let course = courses.find(x=>x.Id==req.params.id);
    let course = await coursesCollection.findOne({_id:ObjectId(req.params.id)});
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
app.post("/courses",async function(req,res){
    let responseBody = {
        Success:true,
        Error:"",
        Data:req.body
    }

    let validationResult = await validateCourse(req.body);
    responseBody.Success=validationResult.Success;
    responseBody.Error=validationResult.Error;

    if(responseBody.Success){
        //req.body.Id=settings.coursesLastId++;
    
        //courses.push(req.body);
        //saveToDB();
        coursesCollection.insertOne(req.body);
        
    }


    res.send(responseBody)
})

//update course
app.put("/courses",async function(req,res){
    //let course = courses.find(x=>x.Id==req.body.Id);
    let course =  await coursesCollection.findOne({_id:ObjectId(req.body._id)});
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
        let validationResult = await validateCourse(req.body);
        responseBody.Success=validationResult.Success;
        responseBody.Error=validationResult.Error;
    }

    if(responseBody.Success){
        //course.Name=req.body.Name;
        //course.Time=req.body.Time;
        //saveToDB();
        coursesCollection.updateOne({_id:ObjectId(req.body._id)},{$set:{Name:req.body.Name,Time:req.body.Time}});
    }
    res.send(responseBody);
})


//delete course
app.delete("/courses/:id",async function(req,res){
    //let courseIndex = courses.findIndex(x=>x.Id==req.params.id);
    let course = await coursesCollection.findOne({_id:ObjectId(req.params.id)});
    let responseBody = {
        Success:true,
        Error:"",
        Data:req.params.id
    }

    //if(courseIndex==-1){
    if(!course){
        responseBody.Success=false;
        responseBody.Error="Course Not Found"; 
    }

    if(responseBody.Success){
        //courses.splice(courseIndex,1);
        //saveToDB();
        coursesCollection.deleteOne({_id:ObjectId(req.params.id)});
    }
    res.send(responseBody);
})




app.post("/users/login",async function(req,res){
    let user = await usersCollection.findOne({Name:req.body.Name,Password:Md5(req.body.Password)});
    let responseBody = {
        Success:true,
        Error:"",
        Data:""
    }

    if(user){
        let sessionId = uuidv4();
        responseBody.Data={sessionId};
        usersCollection.updateOne({_id:ObjectId(user._id)},{$set:{SessionId:sessionId}})
    }else{
        responseBody.Success=false;
        responseBody.Error="Username or Password Not correct";
    }

    res.send(responseBody);
});


async function validateCourse(course){
    
    let validationResult = {Success:true,Error:""}
    if(!course.Name || course.Name.length<3){
        validationResult.Success=false;
        validationResult.Error="Course Name Should Be At Least 3 Characters";
    }

    //let exists = courses.find(x=>x.Name==course.Name && x.Id != course.Id);
    let exists = await coursesCollection.findOne({_id:{$ne:ObjectId(course._id)},Name:course.Name});
    if(exists){
        validationResult.Success=false;
        validationResult.Error="Course Name Already Exists";
    }
    return validationResult;
}









app.get("/users",async function(req,res){
    let responseBody = {
        Success:true,
        Error:"",
        Data: await usersCollection.find({}).toArray()
    }
    res.send(responseBody);
})

app.get("/users/:id",async function(req,res){
    //let course = courses.find(x=>x.Id==req.params.id);
    let course = await usersCollection.findOne({_id:ObjectId(req.params.id)});
    let responseBody = {
        Success:true,
        Error:"",
        Data:course
    }
    if(!course){
        responseBody.Success=false;
        responseBody.Error="User Not Found"; 
    }
    
    res.send(responseBody);
})

//add course
app.post("/users",async function(req,res){
    let responseBody = {
        Success:true,
        Error:"",
        Data:req.body
    }

    let validationResult = await validateUser(req.body);
    responseBody.Success=validationResult.Success;
    responseBody.Error=validationResult.Error;

    if(responseBody.Success){
        //req.body.Id=settings.coursesLastId++;
    
        //courses.push(req.body);
        //saveToDB();
        req.body.Password = Md5(req.body.Password);
        usersCollection.insertOne(req.body);
        
    }


    res.send(responseBody)
})

//update course
app.put("/users",async function(req,res){
    //let course = courses.find(x=>x.Id==req.body.Id);
    let course =  await usersCollection.findOne({_id:ObjectId(req.body._id)});
    let responseBody = {
        Success:true,
        Error:"",
        Data:course
    }

    if(!course){
        responseBody.Success=false;
        responseBody.Error="User Not Found"; 
    }

    if(responseBody.Success){
        let validationResult = await validateUser(req.body);
        responseBody.Success=validationResult.Success;
        responseBody.Error=validationResult.Error;
    }

    if(responseBody.Success){
        //course.Name=req.body.Name;
        //course.Time=req.body.Time;
        //saveToDB();
        usersCollection.updateOne({_id:ObjectId(req.body._id)},{$set:{Name:req.body.Name,Age:req.body.Age,Password:Md5(req.body.Password)}});
    }
    res.send(responseBody);
})


//delete course
app.delete("/users/:id",async function(req,res){
    //let courseIndex = courses.findIndex(x=>x.Id==req.params.id);
    let course = await usersCollection.findOne({_id:ObjectId(req.params.id)});
    let responseBody = {
        Success:true,
        Error:"",
        Data:req.params.id
    }

    //if(courseIndex==-1){
    if(!course){
        responseBody.Success=false;
        responseBody.Error="User Not Found"; 
    }

    if(responseBody.Success){
        //courses.splice(courseIndex,1);
        //saveToDB();
        usersCollection.deleteOne({_id:ObjectId(req.params.id)});
    }
    res.send(responseBody);
})




async function validateUser(user){
    
    let validationResult = {Success:true,Error:""}
    if(!user.Name || user.Name.length<3){
        validationResult.Success=false;
        validationResult.Error="User Name Should Be At Least 3 Characters";
    }

    //let exists = courses.find(x=>x.Name==course.Name && x.Id != course.Id);
    let exists = await usersCollection.findOne({_id:{$ne:ObjectId(user._id)},Name:user.Name});
    if(exists){
        validationResult.Success=false;
        validationResult.Error="User Name Already Exists";
    }
    return validationResult;
}




app.listen(8080);