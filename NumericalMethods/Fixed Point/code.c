#include<stdio.h>
#include<stdlib.h>
#include<math.h>
float f(float x)
{
  float z;
  z=x*x*x+x*x-1;
  return z;
}
float g(float x)
{
  return (1/sqrt(1+x));
}
int main()
{
  float x0,x1;
  float e=0.001;
  int itr=1;
  printf("enter initial guess:\n");
  scanf("%f",&x0);
  while(fabs(f(x0))>e)
  {
    x1=g(x0);
    x0=x1;
    printf("root x%d = %f\n",itr,x0);
    itr++;
  }
  printf("\n\nFinal root= %f\n",x0);
  return 0;
}