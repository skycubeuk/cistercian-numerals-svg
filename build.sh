#!/bin/bash
python3 ./main.py
svgo -f ./out -o ./out
php ./to_img.php