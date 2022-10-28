import glob
from pathlib import Path
import re

inpath = "./in-seg/"


def strip_svg_tags(text):
    return re.search('(^<svg.*?>)(.*?)(</svg>)', text).group(2)


def gensvg(x):
    out = []
    x = str(x)
    while len(x) < 4:
        x = "0" + x
    if int(x[0]) > 0:
        out.append(strip_svg_tags(Path(inpath + x[0] + "000.svg").read_text()))
    if int(x[1]) > 0:
        out.append(strip_svg_tags(Path(inpath + x[1] + "00.svg").read_text()))
    if int(x[2]) > 0:
        out.append(strip_svg_tags(Path(inpath + x[2] + "0.svg").read_text()))
    if int(x[3]) > 0:
        out.append(strip_svg_tags(Path(inpath + x[3] + ".svg").read_text()))
    with open('./out/' + x + ".svg", 'w') as out_file:
        out_file.write(Path(inpath + "base.svg").read_text().replace("@rep@", "\n".join(out)))


for x in range(9999):
    x = x+1
    gensvg(x)
