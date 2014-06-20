library("knitr")
files = list.files()
for (file in files) {
  l = nchar(file)
  if (substring(file, l-5, l)==".Rhtml") {
    knit(file)
  }
}

