cp ~/git/datas
/opt/ImageMagick/bin/convert Alex\ Boklin.jpg -resize 200 alex.jpg
/opt/ImageMagick/bin/convert Nathan\ Janos.jpg -resize 200 nathan.jpg
/opt/ImageMagick/bin/convert Karl\ Mamer.jpg -resize 200 karl.jpg
/opt/ImageMagick/bin/convert Daniel\ Loxton.jpg -resize 200 -crop 200x200 daniel.jpg
mv daniel-0.jpg daniel.jpg
rm daniel-1.jpg 
/opt/ImageMagick/bin/convert Lieven\ Devreese.jpg -resize 200 lieven.jpg
/opt/ImageMagick/bin/convert Noelle\ Sio.jpg -resize 200 noelle.jpg
/opt/ImageMagick/bin/convert Richard\ Saunders.jpg -resize 200 richard.jpg
/opt/ImageMagick/bin/convert Sharon\ Hill.jpg -resize 200 sharon.jpg
/opt/ImageMagick/bin/convert Susan\ Gerbic.jpeg -crop 1062x1062 -resize 200 susan.jpg
mv susan-0.jpg susan.jpg
rm susan-1.jpg 
mv alex.jpg ~/git/dataskeptic/www/bf/
mv karl.jpg ~/git/dataskeptic/www/bf/
mv nathan.jpg ~/git/dataskeptic/www/bf/
mv daniel.jpg ~/git/dataskeptic/www/bf/
mv lieven.jpg ~/git/dataskeptic/www/bf/
mv noelle.jpg ~/git/dataskeptic/www/bf/
mv richard.jpg ~/git/dataskeptic/www/bf/
mv sharon.jpg ~/git/dataskeptic/www/bf/
mv susan.jpg ~/git/dataskeptic/www/bf/
pushd ~/git/dataskeptic/www/bf/
git add *.jpg
git commit -m "guest images"
git push
popd
