import java.io.*;
import java.util.*;
import java.text.*;
import java.math.*;
import java.util.regex.*;
public class Solution {
	public static int foo(long l){
		int len = String.valueOf(l).length();
		if(len == l) return 1;
		return 1 + foo(len);
	}
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        String s = in.next();
		while(!s.equals("END")){
			System.out.println (foo (Long.parseLong(s)) );
			s = in.next();
		}
    }
}