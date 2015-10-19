import BeautifulSoup as soup
import os
import sys

file = sys.argv[1]
f = open(file, 'r')
data = f.read()
f.close()

p = soup.BeautifulSoup(data)

middleObj = p.find('div', {'id': 'notebook-container'})
middle = str(middleObj)
middle = middle.replace('<!-- audio player -->', '<audio src="<? echo($url); ?>" preload="auto" />')
header = '<? include("../header.php") ?><div id="bbody">'
footer = '</div><? include("../footer.php") ?>'
f = open(file[0:file.find('.')] + '.php', 'w')
f.write(header + middle + footer)
f.close()
