#the day of sign

一个以**时间**和**空间**为基础元素的网站

核心理念依然是**由0到1**

##20140727

接下来的设计思路：

时间元素由**时间指针**来表现

空间元素由**银河宇宙**来表现

##20140811

rotate旋转时

瞬间由一个角度切换到另一个角度（2个选择器里有不同的角度，从一个选择器切换到另一个选择器）

似乎直接走最小弧度

如初始值到330，转过的角度则只有30

但是如果默认值设定为0时，转过则会实现330

初始值与结束角度都需要设定值，如初始值rotateZ(0deg) -> rotateZ(360deg)

此时如果存在其他rotate如rotateX也需要为其设定完整的初始值与结束值，否则所有rotate动画都会走最短路径

rotate3d设0无效

##20140813

perspective: 0px; 动画时会有个初始化效果，300px->0px 过程与终点不同

##20140823

博客什么的还是算了，实在不适合我，还是按自己的方式把readme当做技术文字记录用了

以时空为主题的话，果然还是要有个“未来”元素，一直很想制作电影动漫里常出现的操作框的效果，但是每次做完总觉的哪里不对，隐隐的就是有种不和谐感。

另外，这个点击次数是有点多了，操作过于繁琐，就算当做游戏来对待也是很糟糕的体验。

______
嗯，动画效果的重心果然还是在时间算法上，不过就算这样，感觉tween算法也不能很好的表现出来，莫非要亲自写一套高定制的算法- -？

总有种漫画画到一半发现自己的放射线画的太差了，然后就停下来苦练放射线的既视感。

______
把博客删掉以后，前两天的commit记录变0了，current streak重新开始计算了╮(╯▽╰)╭

##20140826

虽然current streak没了，但是成就还是要做

布局卡壳了，不知道怎么做比较好看。

##20140827

打鱼模式全开

也许这段时间先在本子上画一下构想比较好

##20140829

打鱼

##20140830

打鱼2，睡了一下午，晚上估计要熬夜了

perspective比translateZ帅多了

##20140905

熬夜毁一周

##20140908

matrix3d貌似没有系统的教程，不过three.js倒是实现了3d的算法。

初步实验matrix3d单个值修改时大概长这样

scaleX skewX  rotateX 0

skewY  scaleY rotateY 0

unknow unknow unknow  unknow

translateX tanslateY tanslateZ scaleZ

3d转换好像需要7个矩阵相乘。。。

##20140909

3d转换的公式是这个：

	var sl = [
		[s,0,0,0],
		[0,s,0,0],
		[0,0,s,0],
		[0,0,0,1]
	];

	var rx = [
		[1,0,0,0],
		[0,Math.cos(a), Math.sin(-a), 0],
		[0,Math.sin(a), Math.cos( a), 0],
		[0,0,0,1]
	];

	var ry = [
		[Math.cos( b), 0, Math.sin(b),0],
		[0,1,0,0],
		[Math.sin(-b), 0, Math.cos(b), 0],
		[0,0,0,1]
	];

	var rz = [
		[Math.cos(c), Math.sin(-c), 0, 0],
		[Math.sin(c), Math.cos( c), 0, 0],
		[0,0,1,0],
		[0,0,0,1]
	];

	var tr = [
		[1,0,0,0],
		[0,1,0,0],
		[0,0,1,0],
		[x,y,z,1]
	];

然后把5个矩阵相乘就是最后的matrix3d了，具体的矩阵乘积公式见本次提交。或者引入sylvester.js