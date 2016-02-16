#include<stdio.h>
void main()
{
  int i=0,j=0,k=0;
  for(i=2;i<=4;i++)
  {
    for(j=3;j>=i;j--)
    {
      printf(" ");
    }
    for(k=1;k<=i;k++)
    {
      if(k%2==0)
        printf(" ");
      else
        printf("*");
    }
  }
    for(i=1;i<=3;i++)
    {
      for(j=1;j<=i;j++)
      {
        printf("\n");
      }
      for(k=3;k>=i;k--)
      {
        if(k%2==0)
          printf(" ");
      else
        printf("*");
      }
    }
  }

  