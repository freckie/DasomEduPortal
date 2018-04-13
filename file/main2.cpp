#// more advanced 구구단
// 재귀로 구구단을 만들자!
#include<iostream>
#include<typeinfo>
int gogodan(int n,int gob)
{
	
	std::cout << n << " * " << gob <<" = "<< gob*n << std::endl;
	++gob;
	
	if (gob == 10)
		return 1;
	else
		return gogodan(n,gob);
	
}
int main() {
	int gob = 1;
	int m;
	
	std::cout << "------------------------------------재귀 구구단(recursive function) 99dan-----------------" << std::endl;
	std::cout << "입력할 한자리수를 입력하시오. ", std::cin >> m;
	if (m > 9||m<1) 
	{
		std::cerr << "0~9까지의 숫자를 입력하시오." << std::endl;
		return 0;
	}
	std::cout << m << "단 출력" << std::endl;
	gogodan(m,gob);

	



}