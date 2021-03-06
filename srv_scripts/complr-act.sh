# $1 = dirname
# $2 = language
# $3 = filename
# $4 = username
cd ..
cd code_dep/$1/$2
rm e_$4.txt				##Remove Previous Error File
rm out_$4.txt				##Remove Previous Output File
##For C Source Files
if [ $2 = "c" ]
then
 if !(test -s tmp_inps.txt)					##Creates a dumb inps file if not existing
 then
   touch tmp_inps.txt
 fi  
 gcc $3 -o $4.out 2> e_$4.txt					##Compiles the Code and stores errors
 if_err="Program was not executed as there were Errors"
 not_err="There were no errors"
 if test -s e_$4.txt						##Test if there are errors in the code
 then
  errs=1
  echo $if_err>out_$4.txt
 else
  timeout 3s ./$4.out<tmp_inps.txt>out_$4.txt			##Limited execution time of 3seconds for the program
  osize=`stat -c%s out_$4.txt`					##Check and truncate the output file if necessary
  if test $osize -gt 65538					##To truncate the file if size -gt 64kb
    then
      truncate -s65538 out_$4.txt
      echo "Timeout">>out_$4.txt
  fi
  echo $not_err>e_$4.txt
  errs=0
 fi

##FOR COMPILING C++ FILES
else if [ $2 = "cpp" ]
then
 if !(test -s tmp_inps.txt)					##Creates a dumb inps file if not existing
 then
   touch tmp_inps.txt
 fi  
 g++ $3 -Wall -pedantic -o $4.out 2> e_$4.txt
 if_err="Program was not executed as there were Errors"
 not_err="There were no errors"
 if test -s e_$4.txt
 then
  errs=1
  echo $if_err>out_$4.txt
 else
  timeout 3s ./$4.out<tmp_inps.txt>out_$4.txt 
  osize=`stat -c%s out_$4.txt`					##Check and truncate the output file if necessary
  if test $osize -gt 65538					##To truncate the file if size -gt 64kb
    then
      truncate -s65538 out_$4.txt
      echo "Timeout">>out_$4.txt
  fi
  echo $not_err>e_$4.txt
  errs=0
 fi
 fi
# elif [ $2 -eq "lang3" ]
# then
# else
# fi
rm tmp_inps.txt			##Remove Temporary Inputs File
fi
exit $errs
