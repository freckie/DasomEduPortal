#-*-encoding:utf8-*-

'''
< 프로그램 루틴 >

1. 키워드로 검색해서 검색 결과 개수를 얻는다. (func get_page_num)
1-1. 결과를 토대로 읽을 페이지 개수를 계산한다.
2. 1페이지부터 한 페이지씩 html 파싱한다. (func get_bs)
2-1. 결과에서 최대 10개의 url을 list로 얻어온다. (func get_url)
3. url에서 naver blog가 확인되었으면 ID를 얻는다. (func get_id)
3-1. 이미 조회한 ID라면 다음 url로 넘어간다. (func get_today)
3-2. url을 방문하여 투데이를 얻어온다. (func get_today)

'''


import requests
import re
import time
from urllib import parse
from bs4 import BeautifulSoup
from selenium import webdriver
# 전역 변수
header = {'user-agent' : 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3239.132 Safari/537.36'}
finish_id_list = [] # :: 이미 검색이 끝난 블로그의 ID
blogger_list = [] # :: blogger 객체 리스트
driver_dir = './chromedriver.exe'

''' 
********* 클래스 정의 *********
'''

class Blogger:
    def __init__(self, id, today=0):
        self.id = id
        self.today = today

    def __str__(self):
        return ("ID : " + self.id + " / Today : " + str(self.today))

''' 
********** 함수 정의 ********** 
'''

# 검색 키워드로 검색 결과 개수를 받아와서, 읽을 페이지 개수를 리턴.
def get_page_num(keyword):
    url = "https://search.naver.com/search.naver?where=post&query=" + str(keyword)
    html = requests.get(url, headers=header).text
    bs = BeautifulSoup(html, 'html.parser')
    #temp = bs.find('div',class_='blog section _blogBase').get_text()
    temp = bs.select('#main_pack > div.blog.section._blogBase > div > span')[0].getText()
    number = int(temp.split(' / ')[1].replace(',', '').replace('건', ''))

    if number%10 == 0:
        return int(number/10)
    else:
        return int(number/10) + 1

# 검색 키워드와 페이지 번호를 입력하면 html 파싱해서 리턴.
def get_bs(keyword, page_no):
    page_start = (page_no - 1)*10 + 1
    url = "https://search.naver.com/search.naver?where=post&query=" + str(keyword) + "&start=" + str(page_start)
    html = requests.get(url, headers=header).text
    bs = BeautifulSoup(html, 'html.parser')

    return bs

# 해당 페이지에서 10개의 url 수집
def get_url(bs):
    li = bs.select('#elThumbnailResultArea > li.sh_blog_top')#[0].find_all(".sh_blog_top")
    url_list = []

    for a in li:
        hi = a.select('dl > dd.txt_block > span > a.url')[0].get('href')
        url_list.append(hi)

    return url_list

# url에서 ID 추출. (naver blog가 아니라면 None 리턴)
def get_id(url):
    if 'blog.naver.com' in url:
        return url.split('/')[3].split('?')[0]

    elif 'blog.me' in url:
        return url.split('.')[0].split('/')[2]

    else:
        return None

# 해당 ID의 블로그 방문, 투데이 추출

def get_today(driver, id):
    global idx
    # 이미 조회한 ID가 아니라면,
    if not id in finish_id_list:
        url = "https://m.blog.naver.com/PostList.nhn?blogId=" + str(id)
        driver.get(url)
        time.sleep(sleeping_time)  # 크롤링 간격
        html = driver.page_source
        bs = BeautifulSoup(html, 'html.parser')
        today_str = str(bs.select('#rego_cover > div.cover_cont > div.tit_area > div.count')[0]).replace(',', '')

        # 정규식으로 today 검출
        p = re.compile('(오늘)\s[0-9]+')
        today = int(p.search(today_str).group().split(" ")[1])

        # 조회한 ID 저장
        finish_id_list.append(id)
        print(">>>",idx,'번째 추출 -> ID: ',id , ', TODAY: ',today)
        with open('data.txt','a') as f:
            f.write(str(id)+','+str(today)+'\n')
        idx += 1
        return Blogger(id, today)

    else:
        return None

# main용 시간 출력 함수
def print_time(start_time):
    now_time = time.time()
    print("[INFO] 누적 실행 시간 : " + str(round(now_time - start_time, 4)) + "sec")


''' 
********** main 정의 ********** 
'''
if __name__ == "__main__":
    keyword = parse.quote(input("검색할 키워드 : "))
    start_time = time.time()
    sleeping_time = 2  # :: 크롤링 시간 간격 (초 단위)
    # 1. 페이지 수 계산 (네이버에서는 100페이지까지만 가능)
    pages = get_page_num(keyword)
    if pages>=100:
        pages = 100


    print("[INFO] 검색가능 페이지 수 : " + str(pages))
    # 의뢰추가부분으로 page, delay설정부분
    pages = int(input(">>> 몇페이지 까지 추출할까요 (기본 100) :: "))
    sleeping_time = int(input(">>> 추출 딜레이 ( 기본 2초) ::  "))
    #print_time(start_time)

    # 2. html 파싱
    driver = webdriver.Chrome(driver_dir)
    idx = 1
    for page in range(1, pages+1):
        print("[INFO] 현재 페이지 : " + str(page) + "/" + str(pages))
        urls = get_url(get_bs(keyword, page))

        for url in urls:
            id = get_id(url)
            if id is not None:
                #try:
                blogger_list.append(get_today(driver, id))
                #except:
                    #print("[ERROR] 수집 실패, ID : " + id)

        print_time(start_time)

    # 3. 브라우저 종료
    driver.quit()

    # 4. None 제거 및 출력
    blogger_list = filter(None, blogger_list)
    print_time(start_time)

    """결과 출력필요시 주석제거
    print("***** 결과 *****")
    for blogger in blogger_list:
        print(blogger)
    """
    input()