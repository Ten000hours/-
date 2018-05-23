import os
import numpy
from tkinter import *
import selectivesearch
from skimage import io


# class Application(Frame):
#     def __init__(self, master=None):
#         Frame.__init__(self, master)
#         self.pack()
#         self.createWidgets()

#     def createWidgets(self):
#         self.helloLabel = Label(self, text='made')
#         self.helloLabel.pack()
#         self.quitButton = Button(self, text='Quit', command=self.quit)
#         self.quitButton.pack()

#     def hello(self):
#         name = self.nameInput.get() or 'world'
#         messagebox.showinfo('Message', 'Hello, %s' % name)


# class naizi(object):
#     """docstring for naizi"""

#     def __init__(self, size, soft, nipple):
#         super(naizi, self).__init__()
#         self.size = size
#         self.soft = soft
#         self.nipple = nipple

#     def naitouting(self):
#         self.nipple += 1
#         self.soft += 1
#         return naizi(self.size, self.soft, self.nipple)

#     def isnaizibig(self):
#         if self.soft > 5 and self.nipple > 4:
#             return True
#         else:
#             return False

#     def shuangsile(self):
#         if self.size > 5 and self.soft > 5:
#             print('cum !!!!!!')
#         else:
#             print('cum ???????')


# class niangmeng(naizi):
#     """docstring for niangmeng"""

#     def __init__(self, name, age, size, soft, nipple):
#         self.name = name
#         self.age = age
#         self.size = size
#         self.soft = soft
#         self.nipple = nipple
#         naizi.__init__(self, self.size, self.soft, self.nipple)

#     def isworthashang(self):
#         if self.age < 30 and self.size > 5 and self.soft > 5:
#             print('fuck her brains out')
#         else:
#             print('fuck off')

#     def isslut(self):
#         if self.age > 20 and self.nipple > 10:
#             return True
#         else:
#             return False


if __name__ == '__main__':
    # xinnaizi = naizi(5, 4, 1)
    # # print(xinnaizi.naitouting().isnaizibig())
    # xinnaizi.naitouting().shuangsile()

    # meinv = niangmeng('baijie', 25, 10, 10, 10)
    # meinv.isworthashang()
    # meinv.naitouting()
    # app = Application()
    # # 设置窗口标题:
    # app.master.title('Hello World')
    # # 主消息循环:
    # app.mainloop()
	image = io.imread('E://test.jpg')
	img_lbl, regions = selectivesearch.selective_search(
        img, scale=500, sigma=0.9, min_size=10)
	candidates = set()
	import pdb
	pdb.set_trace()
	for r in regions: 
		if r['rect'] in candidates:  
			continue  
        # excluding regions smaller than 2000 pixels  
		if r['size'] < 2000:  
			continue  
        # distorted rects  
		x, y, w, h = r['rect']  
		if w / h > 1.2 or h / w > 1.2:  
			continue  
		candidates.add(r['rect'])  
  
    # draw rectangles on the original image  
	fig, ax = plt.subplots(ncols=1, nrows=1, figsize=(6, 6))  
	ax.imshow(img)  
	for x, y, w, h in candidates:  
		print (x, y, w, h)  
		rect = mpatches.Rectangle(  
            (x, y), w, h, fill=False, edgecolor='red', linewidth=1)  
		ax.add_patch(rect)  
  
	plt.show()  
