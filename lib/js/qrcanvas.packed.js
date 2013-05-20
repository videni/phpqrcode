/*
 * PHP QR Code encoder
 *
 * QR Code CANVAS support 
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
 
 eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('12 X(F){e(F==\'0\'){13 0}x{a 11=F.1h();a 15=1;e(F==11)15=-1;a 1c=11.1g(0)-1F;13 1c*15}}12 1C(F){a b=1D 1B();a r=F.o(\',\');1o(r.L>0){a V=r.v();a J=V.1h();1l(J){k\'P\':k\'R\':e(V==J){b.d(\'S\')}x{b.d(\'W\')}b.d(J);a q=r.v();a Q=q.L;N(a i=0;i<Q;i++){a u=0;a U=q.14(i);e(U==\'z\'){u+=1A;i++}x e(U==\'Z\'){u+=1E;i++}x e(U==\'+\'){u+=1J;i++};a n=q.1g(i);e(n>=1f){u+=((n-1f)+10)}x e(n>=1k){u+=((n-1k)+1H)}x e(n>=1j){u+=(n-1j)}b.d(u+\'\')}m;k\'B\':a 1i=t(r.v());N(a Y=0;Y<1i;Y++){e(V==J){b.d(\'S\')}x{b.d(\'W\')}b.d(\'B\');b.d(\'M\');a g=t(r.v());a f=t(r.v());b.d(g+\'\');b.d(f+\'\');b.d(\'T\');a q=r.v();q=q.o(\'1\').s(\'1x\').o(\'2\').s(\'1y\').o(\'3\').s(\'1t\').o(\'4\').s(\'1v\').o(\'5\').s(\'1w\').o(\'6\').s(\'1r\').o(\'7\').s(\'1K\').o(\'8\').s(\'1u\').o(\'9\').s(\'1V\');a Q=q.L;N(a i=0;i<Q;i+=2){g+=X(q.14(i));f+=X(q.14(i+1));b.d(g+\'\');b.d(f+\'\')}b.d(\'E\')}m;k\'O\':N(i=0;i<3;i++){a g=t(r.v());a f=t(r.v());b.d(\'S,R\');b.d(g);b.d(f);b.d(\'7,7,W,R\');b.d(g+1);b.d(f+1);b.d(\'5,5,S,R\');b.d(g+2);b.d(f+2);b.d(\'3,3\')}m}}13 b.s(\',\')}12 1L(b,1e,w,G,H,A,y){a I=1M.1U(1e);e(!A)A=2;e(!y)y=2;e(!G)G=I.1S;e(!H)H=I.1Q;a j=t(G/(w+(A*2)));a l=t(H/(w+(y*2)));a 1n=G-((w+(A*2))*j);a 1q=H-((w+(y*2))*l);a D=j*A+t(1n/2.0);a C=l*y+t(1q/2.0);e(j<1)j=1;e(l<1)l=1;a h=b.o(\',\');a 1m=h.L;a c=0;e(I.1p){a p=I.1p(\'1z\');a K=h[c];a 16=\'\';p.18="1d";p.17(D,C,w*j,w*l);1o(c<1m){a 19=1s;1l(K){k\'S\':p.18="1O";m;k\'W\':p.18="1d";m;k\'B\':p.1T();m;k\'M\':c++;a g=h[c];c++;a f=h[c];p.1P(g*j+D,f*l+C);m;k\'T\':c++;a g=h[c];c++;a f=h[c];p.1R(g*j+D,f*l+C);m;k\'E\':p.1N();m;k\'P\':c++;a g=h[c];c++;a f=h[c];p.17(g*j+D,f*l+C,j,l);m;k\'R\':c++;a g=h[c];c++;a f=h[c];c++;a 1b=h[c];c++;a 1a=h[c];p.17(g*j+D,f*l+C,1b*j,1a*l);m;1G:19=1I;c--;K=16;m}16=K;e(19){c++;K=h[c]}}}}',62,120,'||||||||||var|ops|opExPos|push|if|py|px|opEx||scalex|case|scaley|break||split|ctx|points|strTab|join|parseInt|ccode|shift||else|ybord||xbord||offy|offx||str|maxx|maxy|canvas|rcode|func|length||for|||plen||||fchar|code||QRdiffCharDecode|no|||updchar|function|return|charAt|multi|lastFunc|fillRect|fillStyle|fetchOp|eh|ew|delta|white|elemId|97|charCodeAt|toUpperCase|count|48|65|switch|opExLen|diffx|while|getContext|diffy|aB|true|aA|bA|Aa|AA|00|aa|2d|60|Array|QRdecompactOps|new|120|64|default|35|false|180|Ab|QRdrawCode|document|fill|black|moveTo|clientHeight|lineTo|clientWidth|beginPath|getElementById|Ba'.split('|'),0,{}))
