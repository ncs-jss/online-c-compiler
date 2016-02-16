#include<iostream>	//Do not write the extension for the included file
int main()		//Main function must return a value
{
 int a,b,c;
 std::cin>>a;		
 /*The namespace std:: has to be used before every I/O Statement
 Inputs take a garbage value if no file is uploaded
 The file for inputs shall contain all the inputs in the order of their occurrence
 The inputs must be seperated by new lines*/
 b=10;
 c=a+b;
 std::cout<<"The sum of "<<a <<" and " <<b <<" is " <<c;
 return(0);		//The value returned by the main function
}
