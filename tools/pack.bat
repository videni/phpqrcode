packer.exe -o ../qrcanvas.packed.tmp.js ../qrcanvas.js
tail.exe -1 < ../qrcanvas.packed.tmp.js > ../qrcanvas.packed.tmp2.js
cat.exe qrcanvas_header.txt > ../qrcanvas.packed.js
cat.exe ../qrcanvas.packed.tmp2.js >> ../qrcanvas.packed.js

cd ..
del qrcanvas.packed.tmp.js
del qrcanvas.packed.tmp2.js

pause