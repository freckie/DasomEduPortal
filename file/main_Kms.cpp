//Want to improve your Korean writing? Writing is an essential tool that will help you adjust to Korean university life. The Ha-Rang Writing Center offers a free tutoring program open to all international students at our university. We encourage you to take advantage of this. The program has always been very popular among international students. Registration opens from November 28 for three days only. Once you are registered, we will match you with a perfect tutor and contact you to arrange your schedule. We are sure that you will be satisfied with our well-experienced tutors. Don't miss this great opportunity to improve your Korean writing. For more information, feel free to email Jiyung Yoon, HRWC Director, at jyoon@hrwc.org.

/*
1. ���� ���� ó�� ��
2. ���� Want ��
3. ���� �빮�� �ҹ��� ���� ��

*/
#include<iostream>
#include<string>
#include<algorithm>
int count(std::string _text, std::string _target)
{
	int _count = 1;
	int idx = 1;
	for (; _text.find(_target,idx) != -1; ++_count)
	{
		idx = _text.find(_target, idx);
		std::cout << _count << " ��°�� ã�ҽ��ϴ�. ��ġ�� : " << idx << std::endl;
		if (_text.find(_target, idx) == -1)// ������ -1 �϶� count�������Ƿ� �ϳ� �������.
			std::cout<<"dsasdasad"<<--_count;
		idx = _text.find(_target, idx + 1);
	}

	return _count-1;
}
int sum_of_count(std::string _text)
{
	int sum = 0;
	sum += count(_text, "at");
	std::cout << sum<<std::endl;
	sum += count(_text, "to");
	std::cout << sum << std::endl;
	sum += count(_text, "from");
	std::cout << sum << std::endl;
	sum += count(_text, "on");
	return sum;
}
int main() 
{
	std::string text = " Want to improve your Korean writing ? Writing is an essential tool that will help you adjust to Korean university life.The Ha - Rang Writing Center offers a free tutoring program open to all international students at our university.We encourage you to take advantage of this.The program has always been very popular among international students.Registration opens from November 28 for three days only.Once you are registered, we will match you with a perfect tutor and contact you to arrange your schedule.We are sure that you will be satisfied with our well - experienced tutors.Don't miss this great opportunity to improve your Korean writing. For more information, feel free to email Jiyung Yoon, HRWC Director, at jyoon@hrwc.org.";
	for (int i = 0; i < text.length(); ++i)
		text[i] = tolower(text[i]);
	std::cout << text << std::endl;
	std::string target;
	std::cout << "ã�� �ܾ �Է��ϼ���.!!", std::getline(std::cin, target);
	if (target == " ")
		std::cout << "�����Դϴ�.";
	std::cout << "���� ���� : " << count(text,target) << std::endl;

	std::cout << "2.�� ���� ~~~~" << std::endl;
	std::cout << sum_of_count(text) << std::endl;
	// on�� 11���ε� �ֳ��ϸ� Once���� on�� �ñ⶧��




	//34

}