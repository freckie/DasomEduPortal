#// more advanced ������
// ��ͷ� �������� ������!
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
	
	std::cout << "------------------------------------��� ������(recursive function) 99dan-----------------" << std::endl;
	std::cout << "�Է��� ���ڸ����� �Է��Ͻÿ�. ", std::cin >> m;
	if (m > 9||m<1) 
	{
		std::cerr << "0~9������ ���ڸ� �Է��Ͻÿ�." << std::endl;
		return 0;
	}
	std::cout << m << "�� ���" << std::endl;
	gogodan(m,gob);

	



}