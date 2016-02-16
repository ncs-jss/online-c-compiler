# $1 = username
# $2 = language
# $3 = filename
cd ..
cd code_dep/$1/$2
if [ $2 = "c" ]
then
 gcc $3 -o $1.out 2> e_$1.txt
 if_err="Program was not executed as there were Errors"
 not_err="There were no errors"
 if test -s e_$1.txt
 then
  errs=1
  echo $if_err>out_$1.txt
 else
  ./$1.out<tmp_inps.txt>out_$1.txt 
  echo $not_err>e_$1.txt
  errs=0
 fi
##elif [ $2 -eq "java" ]
## then
  
## else
## fi
fi
exit $errs
