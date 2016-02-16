#include<stdio.h>	//Do not include conio.h
/*int main()		//Main function must return a value
{
 int a,b,c;
 scanf("%d",&a);	
 /*This input will be taken from the file you upload
 Inputs take a garbage value if no file is uploaded
 The file for inputs shall contain all the inputs in the order of their occurrence
 The inputs must be seperated by new lines
 b=10;
 c=a+b;
 printf("Sum of %d and %d is %d",a,b,c);
 return(0);		//The value returned by the main function
}*/
void main()
{
 int i=1,a=10,b=100,c;
  float c;
  c=(double)a/(double)b;
  printf("c value is %f",c);
  for(i=0;i<5;i++)
    {
  printf("%d",i);
  
     }
  a=10,b=20,c=30;
  for(a=11;a<=b;a++)
    printf("\n%d",a);
  
    
}