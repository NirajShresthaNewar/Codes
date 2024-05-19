#include<stdio.h>
#include<stdlib.h>
#include<math.h>
float f(float x)
  {
     float z;
     z=x*x*x-2*x-5;
     return z;
  }
  int main()
  {
    float x1, x2, x0;
    float e=0.001;
    printf("Enter the value of x1 and x2:\n");
    scanf("%f\n %f\n", &x1, &x2);
    printf("Initial guess %f %f\n", x1, x2);
    if(f(x1)*f(x2)>0)
    {
        printf("wrong initial guess!!!");
        exit (0);
    }
    x0= (x1+x2)/2;
    while (fabs(f(x0))>e)
      {
        if(f(x0)*f(x1)>0)
        {
          x1=x0;
        }
        else
        {
          x2=x0;
        }
        x0= (x1+x2)/2;
        printf("x1=%f x2=%f x0=%f f(x0)=%f\n", x1, x2, x0, f(x0));

      }
    printf("The root = %f ", x0);
    return 0;

  }