#include<stdio.h>	//Do not include conio.h
int main()		//Main function must return a value
{
 int a,b,c,d;
 scanf("%d",&a);	
 /*This input will be taken from the file you upload
 Inputs take a garbage value if no file is uploaded
 The file for inputs shall contain all the inputs in the order of their occurrence
 The inputs must be seperated by new lines*/
 b=10;
 c=a+b;
  d=c*b;
 printf("Sum of %d and %d is %d",a,b,c);
  printf("%d",d);ikhj
 return(0);		//The value returned by the main function
}
