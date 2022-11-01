import glob
import os

from pprint import pprint
files_in = glob.glob('./out/*.svg')
for x in files_in:
    print(x)
    #os.system("rsvg-convert " + x + " -o " + x.replace("out","img").replace("svg", "png") + " -w 30 -a")
