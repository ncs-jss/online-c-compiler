#include<stdio.h>
#include<conio.h>
int n;
void fab(int f,int s)
	{
	  if((f+s)>n)
	    {
	      return;
	    }
	  else
	    {
	      printf("%d",(f+s));
	      fab(s,(f+s));
	    }
	}
void main()
	{
	  clrscr();
	  printf("Enter no\n");
	  scanf("%d",&n);
	  printf("%d%d",0,1);
	  fab(0,1);
	  getch();
	}