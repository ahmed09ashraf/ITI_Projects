var age=0
// prompt("Enter Your Age");
while(age<=0)
{ age =prompt("Enter Your Age");     }
        if (age>0 && age<=10){
          document.write(`You Are Child`)
        }

        else if (age >10 && age<=18){
            document.write(`You Are Teenager`)
        }

        else if (age>18 && age<=50){
            document.write(`You Are Grown Up`)
        }

        else if (age >50){
            document.write(`You Are Old`)
        }
        





// switch (true) {
//     case (age <=10 && age>0):
//         document.write(`You Are Child`)
//         break;
//     case 'age <=18':
//         document.write(`You Are Teenager`)
//         break;
//     case 'age <=50':
//         document.write(`You Are Grown Up`)
//         break;
//     case 'age >50':
//         document.write(`You Are Old`)
//         break;
//     default 
//        prompt("Enter Your Age");
//        break;
// }
