#include<stdio.h>
#include<stdlib.h>
#include<math.h>
float fx1(float x2, float x3){
    float x1;
    x1=(11+2*x2-x3)/6;
    return x1;
}
float fx2(float x1, float x3){
    float x2;
    x2=(5+2*x1-x3)/7;
    return x2;
}
float fx3(float x1, float x2){
    float x3;
    x3=(1+x1+2*x2)/5;
    return x3;
}
int main()
{
    int itr=0;
    float x1,y1,z1,e1,e2,e3,tempx,tempy,tempz;
    float e=0.000;
    printf("Enter initial guess:\n");
    scanf("%f%f",&y1,&z1);
    printf("itr \tx1    \tx2     \tx3     \te1     \te2    \te3\n");
    do{
        tempx=x1;
        tempy=y1;
        tempz=z1;
       
        x1=fx1(y1,z1);
        y1=fx2(x1,z1);
        z1=fx3(x1,y1);
       
        itr=itr+1;
       
        e1=fabs((x1-tempx)/x1);
        e2=fabs((y1-tempy)/y1);
        e3=fabs((z1-tempz)/z1);
        //printing output
        printf("%d\t%0.1f\t%0.4f\t%0.4f\t%0.4f\t%0.4f\t%0.4f\n",itr,x1,y1,z1,e1,e2,e3);
    }while(e1>e && e2>e&& e3>e);
   
    printf("\n______________Output_________________\n");
    printf("x1=%f\t x2=%f\t x3=%f\n",x1,y1,z1);
    printf("Iteration=%d",itr);
    return 0;
}

