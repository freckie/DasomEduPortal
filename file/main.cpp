#include<iostream>
#include<typeinfo>

int main() 
{
	// 5�Է½� 5��, fail
	// 37�Է½� 3~7�ȳ��� fail
	// �ؼ��̰� inputNumber�� ����Ѵ���.
	int check;
	int inputNumber;
	std::cout<<"1~100������ ���ڸ� �Է��Ͻÿ�.",std::cin >> inputNumber;
	if (inputNumber < 0 || inputNumber>99)
		std::cerr << "���� �߻�.(1~99������ ���ڸ� �Է��Ͻÿ�.)" << std::endl;
	/*if (typeid(inputNumber)!=typeid(check) )
		std::cerr << "Ÿ�� �����߻��߽��ϴ�." << std::endl;*/
	else if (inputNumber >= 10) 
	{
		
		int Tens = inputNumber / 10;
		int Unit = inputNumber % 10;
		if (Tens < Unit)
		{
			int temp = Tens;
			Tens = Unit;
			Unit = temp;
		}
			if (Unit == 0)
				Unit += 1;
			for (Unit; Unit <= Tens; ++Unit)
			{
				int gob = 1;
				std::cout << Unit << "�� " << std::endl;
				for (gob; gob < 10; ++gob)
				{
					std::cout << Unit << " *  " << gob << " = " << Unit*gob << std::endl;
				}
			}
			std::cout << std::endl;
		
	}
	else
		for (int loop = 1; loop < 10; ++loop)
		{
			std::cout << inputNumber << " * " << loop << " = " << inputNumber*loop << std::endl;
		}



	return 1;
}