#include<stdio.h>
#include<stdlib.h>
#include<math.h>
float f(float x)
{
    float z;
    z= x*x+2*x-2;
    return z;
}
float df(float x)
{
    float p;
    p=2*x+2;
    return p;
}
int main()
{
    float x1, x0;
    float e=0.0001;
    int itr=1;
    printf("Enter the value of x0:\n");
    scanf("%f", &x0);
    while(fabs(f(x0))>e)
    {
        x1=x0-f(x0)/df(x0);
        x0=x1;
        printf("Iteration %d root = %f\n", itr,x0);
        itr++;
    }
    return 0;
}