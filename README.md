# php_qrcode_direct

php_qrcode_direct 는 [PHP QR Code] 라이브러리를 활용한 유틸입니다.
img 태그에서 바로 불러올 수 있도록 QR Code 이미지를 생성해줍니다. 

php_qrcode_direct is a utility using the [PHP QR Code] library.
Create a QR Code image so that you can import it directly from the img tag.


usage:
img src="/qrcode/direct.php?data=https://domain.com"



구글에서 완전히 동일한 내용의 서비스를 하고는 있습니다.

google qrcode generator : https://chart.apis.google.com/chart?cht=qr&chs=200x200&chld=L|1&chl=https://domain.com


하지만 대량으로 호출해서 사용하게 되면 속도가 너무 느립니다.
따라서 실무에는 적용할 수 없는 상황이어서 직접 개발하게 되었습니다.

