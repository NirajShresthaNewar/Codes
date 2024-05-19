#include <stdio.h>
#include <stdlib.h>
#include<math.h>

float fx1(float x2, float x3)
{
    float x1;
    x1= (11+2*x2-x3)/6;
    return x1;
}
float fx2(float x1, float x3)
{
    float x2;
    x2= (5+2*x1-2*x3)/7;
    return x2;
}
float fx3(float x1, float x2)
{
    float x3;
    x3= (x1+2*x2+1)/5;
    return x3;
}
int main()
{
    int itr=0;
    float x=0, y=0, z=0, x1, y1, z1, e1, e2, e3, tempx, tempy, tempz;
    float e=0.001;
    printf("Enter initial guess: \n");
    scanf("%f%f%f", &x1,&y1, &z1);
    printf("itr\tx1   \tx2   \tx3   \te1   \te2   \te3\n" );
    do{
        tempx=x;
        tempy=y;
        tempz=z;

        x= fx1(y1,z1);
        y= fx2(x1,z1);
        z= fx3(x1,y1);

        itr=itr+1;

        x1 = x;
        y1 = y;
        z1 = z;

        e1= fabs((x1-tempx)/x1);
        e2= fabs((y1-tempy)/y1);
        e3= fabs((z1-tempz)/z1);
        printf("%d\t%0.4f\t%0.4f\t%0.4f\t%0.4f\t%0.4f\t%0.4f\n", itr, x1, y1, z1, e1, e2, e3);

    }while(e1>e && e2>e && e3>e);

    printf("\n _______________ Output ______________\n");
    printf("x1= %f\t x2= %f\t x3= %f\t",x, y, z);
    printf("Iteration = %d", itr);
    return 0;

}
