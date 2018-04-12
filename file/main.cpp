#include<iostream>
#include<typeinfo>

int main() 
{
	// 5입력시 5단, fail
	// 37입력시 3~7안나옴 fail
	// 준석이가 inputNumber로 써야한다함.
	int check;
	int inputNumber;
	std::cout<<"1~100사이의 숫자를 입력하시오.",std::cin >> inputNumber;
	if (inputNumber < 0 || inputNumber>99)
		std::cerr << "에러 발생.(1~99까지의 숫자를 입력하시오.)" << std::endl;
	/*if (typeid(inputNumber)!=typeid(check) )
		std::cerr << "타입 에러발생했습니다." << std::endl;*/
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
				std::cout << Unit << "단 " << std::endl;
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